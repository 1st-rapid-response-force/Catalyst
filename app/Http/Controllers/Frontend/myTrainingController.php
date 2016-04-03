<?php

namespace App\Http\Controllers\Frontend;

use App\ClassCompletion;
use App\InfractionReport;
use App\School;
use App\SchoolTrainingDate;
use App\Section;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class myTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth()->user();
        $coursesInProgress = $user->vpf->schools()->wherePivot('completed', '=','0')->get();
        $coursesCompleted = $user->vpf->schools()->wherePivot('completed', '=','1')->get();


        //Determine Class Sessions signed up for Time that are in the future
        $dates = $user->vpf->schoolTrainingDate()->where('date','>', \Carbon\Carbon::now())->get();

        //Determine if User is teaching any Classes
        $teaching = $this->getTeachingClasses($user);

        //Determine classes that user is eligible for
        $eligibleCourses = $this->eligibleCourses($user);

        \Log::info('SCHOOL: User is viewing school index', ['user'=> [$user->id,$user->email]]);

        return view('frontend.my-training.index')
            ->with('user',$user)
            ->with('coursesInProgress',$coursesInProgress)
            ->with('coursesCompleted',$coursesCompleted)
            ->with('eligibleCourses',$eligibleCourses)
            ->with('teaching',$teaching)
            ->with('dates',$dates);
    }

    public function instructor()
    {
        $user = \Auth()->user();
        //Determine if User is teaching any Classes
        $teaching = $this->getTeachingClasses($user);

        if(!$teaching) {
            \Notification::error('You are not eligible to view this page.');
            return redirect('/my-training');
        }

        return view('frontend.my-training.instructor')
            ->with('user',$user)
            ->with('teaching',$teaching);
    }

    public function completeClass($date_id)
    {
        $user = \Auth()->user();
        $date = SchoolTrainingDate::findOrFail($date_id);

        //Determine if User is teaching any Classes
        $teaching = $this->getTeachingClasses($user);
        if(!$teaching) {
            \Notification::error('You are not eligible to view this page.');
            return redirect('/my-training');
        }

        return view('frontend.my-training.instructor_complete_class')
            ->with('user',$user)
            ->with('date',$date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = \Auth()->user();
        $school = School::find($id);
        $eligibleCourses = $this->courseClearance($user);

        //Used to determine if the user can apply to the course or if they are already taken it or completed it
        $coursesCompletedID = collect($user->vpf->schools()->wherePivot('completed', '=','1')->lists('id'));
        $coursesInProgressID = collect($user->vpf->schools()->wherePivot('completed', '=','0')->lists('id'));
        $courses = $coursesCompletedID->merge($coursesInProgressID);

        if(!$eligibleCourses->contains($id))
        {
            \Notification::error('You are not eligible for this course.');
            return redirect('/my-training');
        }

        //Determine if user has already applied for a time if so store it and return it to the view, else return the time selection
        //screen
        $selectedTimes = collect($user->vpf->schoolTrainingDate()->where('school_id','=', $id)->pluck('id'));
        if($selectedTimes->count() == 0)
        {
            //No class time selected, show dates
            $selected = false;
            $dates = SchoolTrainingDate::where('school_id','=',$id)
                ->where('date','>', \Carbon\Carbon::now())->get();
        } else {
            $selected = true;
            $dates = SchoolTrainingDate::findMany($selectedTimes);
        }

        \Log::info('SCHOOL: User is viewing school', ['user'=> [$user->id,$user->email],'school' => [$school->id,$school->name]]);

        return view('frontend.my-training.show')
            ->with('user',$user)
            ->with('school',$school)
            ->with('coursesEnrolled',$courses)
            ->with('coursesCompleted',$coursesCompletedID)
            ->with('dates',$dates)
            ->with('selected',$selected);

    }

    public function showSection($id,$section_id)
    {
        $user = \Auth()->user();
        $school = School::find($id);
        $section = Section::find($section_id);
        \Log::info('SCHOOL: User is viewing school section', ['user'=> [$user->id,$user->email],'school' => ['id'=>$school->id,'name'=>$school->name,'section' => [$section->id,$section->name]]]);
        return view('frontend.my-training.showSection')
            ->with('school',$school)
            ->with('section',$section)
            ->with('user',$user);
    }

    /**
     * Enroll User into Class.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function enrollClass(Request $request, $id)
    {
        $user = \Auth()->user()->vpf;
        $coursesInProgressID = collect($user->schools()->wherePivot('completed', '=','0')->lists('id'));
        $school = School::find($id);

        if($coursesInProgressID->count() == 2 )
        {
            \Notification::error('You are already enrolled in 2 classes, you need to complete a course before you can apply to another one.');
            return redirect('/my-training');
        }

        $user->schools()->attach([
            $id => ['completed' => 0],
        ]);

        \Log::info('SCHOOL: User is enrolled in school', ['user'=> [$user->id,$user->email],'school' => [$school->id,$school->name]]);
        \Notification::success('You have enrolled in this class successfully');
        return redirect('/my-training');
    }

    public function signupDate($id)
    {
        $user = \Auth()->user();
        $user->vpf->schoolTrainingDate()->attach($id);
        \Log::info('SCHOOL: User is signed up for class training session', ['user'=> [$user->id,$user->email],'session' => [$id]]);
        \Notification::success('You have signed up for a class training session.');
        return redirect('/my-training');
    }


    public function cancelDate($id)
    {
        $user = \Auth()->user();
        $user->vpf->schoolTrainingDate()->detach($id);
        \Log::info('SCHOOL: User cancelled their signup for class training session', ['user'=> [$user->id,$user->email],'session' => [$id]]);
        \Notification::success('You have cancelled your training session appointment.');
        return redirect('/my-training');
    }

    public function completePostClass($date_id,Request $request)
    {
        $user = \Auth()->user();
        $completion = new ClassCompletion;
        $completion->vpf_id = $user->vpf->id;
        $completion->date_id = $date_id;
        $completion->status = 2;
        $completion->attendees = $request->attendees;
        $completion->observers = $request->observers;
        $completion->helpers = $request->helpers;
        $completion->comments = $request->comments;
        $completion->rewards = $request->rewards;
        $completion->issues = $request->issues;
        $completion->save();
        \Log::info('SCHOOL: User has marked a class as complete - instructor', ['user'=> [$user->id,$user->email]]);

        $date = SchoolTrainingDate::findOrFail($date_id);
        $date->status = 2;
        $date->save();

        \Notification::success('You have submitted your school completion form, thank you for teaching this class.');
        return redirect('/my-training');
    }

    public function cancelClass($date_id)
    {
        $user = \Auth()->user();
        $date = SchoolTrainingDate::findOrFail($date_id);

        //Determine if User is teaching any Classes
        $teaching = $this->getTeachingClasses($user);
        if(!$teaching) {
            \Notification::error('You are not eligible to view this page.');
            return redirect('/my-training');
        }

        return view('frontend.my-training.instructor_cancel_class')
            ->with('user',$user)
            ->with('date',$date);
    }

    public function postCancelClass($date_id, Request $request)
    {
        $user = \Auth()->user();
        \Log::warning('SCHOOL: User has marked a class as cancelled - instructor', ['user'=> [$user->id,$user->email]]);

        $date = SchoolTrainingDate::findOrFail($date_id);
        $date->status = 3;
        $date->save();

        $user->vpf->infraction_reports()->create([
            'violator_name' => $user->vpf,
            'violation_summary' => 'This class has been marked for review as the instructor has cancelled it. --- '.$request->violation_summary.' ==== Date ID'.$date->id,
            'reviewed' => false
        ]);

        \Notification::warning('You have cancelled your class, an infraction report has been filed on your behalf.');
        return redirect('/my-training');
    }



    private function courseClearance($user)
    {
        $courses = collect();
        $coursesInProgress = $user->vpf->schools()->wherePivot('completed', '=','0')->lists('id');
        $coursesCompleted = $user->vpf->schools()->wherePivot('completed', '=','1')->lists('id');
        $eligible = $this->eligibleCourses($user);
        $eligible = $eligible->lists('id');
        $courses = $courses->merge($coursesCompleted);
        $courses = $courses->merge($coursesInProgress);
        $courses = $courses->merge($eligible);

        return $courses;

    }

    /**
     * Determines which courses the user is eligible for
     * @param $user
     * @return mixed
     */
    private function eligibleCourses($user)
    {
        $allCourses = School::all();
        $coursesInProgress = $user->vpf->schools()->wherePivot('completed', '=','0')->get();
        $coursesCompleted = $user->vpf->schools()->wherePivot('completed', '=','1')->get();

        // Used to determine, courses that user is eligible in
        $ava = collect();
        $coursesCompletedID = collect($user->vpf->schools()->wherePivot('completed', '=','1')->lists('id'));
        $coursesInProgressID = collect($user->vpf->schools()->wherePivot('completed', '=','0')->lists('id'));
        $courseTest= $coursesCompletedID;

        //Determine Class Sessions signed up for Time that are in the future
        $dates = $user->vpf->schoolTrainingDate()->where('date','>', \Carbon\Carbon::now())->get();


        foreach($allCourses as $course)
        {
            $prCheck = false;
            // Pull all ID's required by course as defined by prerequisites
            if((!is_null($course->prerequisites)) && ($course->prerequisites != ''))
            {
                //Collect Course prerequisites
                $courseID = collect(explode(',',$course->prerequisites));
                //Use Difference, if empty, then all prerequisites have been taken, else it means they are not eligible
                $diff = $courseID->diff($courseTest);
                if(($diff->isEmpty()) && ($course->minimumRankRequired <= $user->vpf->rank->id))
                {
                    $prCheck = true;
                }
            } else {
                $prCheck = true;
            }

            // Pull all ID's required by course as defined by onebyone
            if((!is_null($course->oneofcourses)) && ($course->prerequisites != ''))
            {
                //Collect Course prerequisites
                $courseID = collect(explode(',',$course->oneofcourses));
                $count = $courseID->count();

                $diff = $courseID->diff($courseTest);
                if(($diff->count() != $count) && ($course->minimumRankRequired <= $user->vpf->rank->id) && ($prCheck == true)) $ava->push($course->id);
            } else {
                if($prCheck == true)
                    $ava->push($course->id);
            }

        }
        $ava = $ava->diff($coursesInProgressID);

        //Eligible Courses - FUCK YEAH
        $ava = $ava->diff($courseTest);
        $eligibleCourses = School::findMany($ava);

        return $eligibleCourses;
    }

    public function getTeachingClasses($user)
    {
        $classes = SchoolTrainingDate::where('responsible_id','=',$user->vpf->id)->where('status','=', 1)->get();
        if($classes->count() > 0)
        {
            return $classes;
        } else {
            return false;
        }
    }

}
