<?php

namespace App\Http\Controllers\Frontend;

use App\School;
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
        $courseTest= $coursesCompletedID->merge($coursesInProgressID);

        foreach($allCourses as $course)
        {
            // Pull all ID's required by course as defined by prerequisites
            if(!is_null($course->prerequisites))
            {
                //Collect Course prerequisites
                $courseID = collect(explode(',',$course->prerequisites));
                //Use Difference, if empty, then all prerequisites have been taken, else it means they are not eligible
                $diff = $courseID->diff($courseTest);
                if($diff->isEmpty()) $ava->push($course->id);
            } else {
                $ava->push($course->id);
            }
        }
        //Eligible Courses - FUCK YEAH
        $ava = $ava->diff($courseTest);
        $eligibleCourses = School::findMany($ava);


        return view('frontend.my-training.index')
            ->with('user',$user)
            ->with('coursesInProgress',$coursesInProgress)
            ->with('coursesCompleted',$coursesCompleted)
            ->with('eligibleCourses',$eligibleCourses);
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
        //
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
