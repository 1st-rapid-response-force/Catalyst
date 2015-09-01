<?php

namespace App\Http\Controllers\Backend;

use App\Assignment;
use App\Group;
use App\MOS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $assignments = Assignment::all();


        return view('backend.assignments.index')
            ->with('assignments',$assignments);
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
        $assignment = Assignment::find($id);
        $mos = MOS::all();
        $groups = Group::all();

        return view('backend.assignments.edit')
            ->with('assignment',$assignment)
            ->with('mos',$mos)
            ->with('groups',$groups);
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
        $assignment = Assignment::find($id);
        $assignment->group_id = $request->group_id;
        $assignment->mos_id = $request->mos_id;
        $assignment->name = $request->name;
        $assignment->entry_level = $request->entry_level;
        $assignment->transfer_open = $request->transfer_open;
        $assignment->save();

        \Notification::success('Assignment Updated Successfully');
        return redirect('/admin/assignments/');
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
