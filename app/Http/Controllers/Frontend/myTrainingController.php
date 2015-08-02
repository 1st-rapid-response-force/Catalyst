<?php

namespace App\Http\Controllers\Frontend;

use App\School;
use App\SchoolTrainingDate;
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
            // Pull all ID's required by course as defined by prerequisites
            if(!is_null($course->prerequisites))
            {
                //Collect Course prerequisites
                $courseID = collect(explode(',',$course->prerequisites));
                //Use Difference, if empty, then all prerequisites have been taken, else it means they are not eligible
                $diff = $courseID->diff($courseTest);
                if(($diff->isEmpty()) && ($course->minimumRankRequired <= $user->vpf->rank->id)) $ava->push($course->id);
            } else {
                $ava->push($course->id);
            }
        }
        $ava = $ava->diff($coursesInProgressID);

        //Eligible Courses - FUCK YEAH
        $ava = $ava->diff($courseTest);
        $eligibleCourses = School::findMany($ava);


        return view('frontend.my-training.index')
            ->with('user',$user)
            ->with('coursesInProgress',$coursesInProgress)
            ->with('coursesCompleted',$coursesCompleted)
            ->with('eligibleCourses',$eligibleCourses)
            ->with('dates',$dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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



        //Used to determine if the user can apply to the course or if they are already taken it or completed it
        $coursesCompletedID = collect($user->vpf->schools()->wherePivot('completed', '=','1')->lists('id'));
        $coursesInProgressID = collect($user->vpf->schools()->wherePivot('completed', '=','0')->lists('id'));
        $courses = $coursesCompletedID->merge($coursesInProgressID);

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

        return view('frontend.my-training.show')
            ->with('user',$user)
            ->with('school',$school)
            ->with('coursesEnrolled',$courses)
            ->with('coursesCompleted',$coursesCompletedID)
            ->with('dates',$dates)
            ->with('selected',$selected);

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

        if($coursesInProgressID->count() == 2 )
        {
            \Notification::error('You are already enrolled in 2 classes, you need to complete a course before you can apply to another one.');
            return redirect('/my-training');
        }

        $user->schools()->attach([
            $id => ['completed' => 0],
        ]);

        \Notification::success('You have enrolled in this class successfully');
        return redirect('/my-training');
    }

    public function signupDate($id)
    {
        $user = \Auth()->user();
        $user->vpf->schoolTrainingDate()->attach($id);
        \Notification::success('You have signed up for a class training session.');
        return redirect('/my-training');
    }


    public function cancelDate($id)
    {
        $user = \Auth()->user();
        $user->vpf->schoolTrainingDate()->detach($id);
        \Notification::success('You have cancelled your training session appointment.');
        return redirect('/my-training');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
