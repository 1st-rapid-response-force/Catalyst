<?php

namespace App\Http\Controllers\Backend;

use App\Group;
use Illuminate\Http\Request;
use App\SquadChatter;
use App\UnitAnnouncements;
use App\SquadAnnouncements;
use App\Perstat;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('backend.groups.index')
            ->with('groups', $groups);
    }

    public function mySquad($group_id)
    {
        $user = \Auth()->user();
        $group = Group::find($group_id);
        $chatter = SquadChatter::where('group_id','=',$group_id)->orderBy('created_at','desc')->Paginate(15);
        $unitAnnouncements = UnitAnnouncements::all()->sortByDesc('created_at')->take(2);
        $perstat = Perstat::where('active','=','1')->first();

        return view('backend.groups.mySquadAdmin')
            ->with('group',$group)
            ->with('user',$user)
            ->with('unitAnnouncements', $unitAnnouncements)
            ->with('chatter',$chatter)
            ->with('perstat',$perstat);
    }

    public function addChatter($group_id, Request $request)
    {
        $this->validate($request, [
            'chatter' => 'required',
        ]);
        $user = \Auth()->user();

        $chatter = new SquadChatter;
        $chatter->message = $request->chatter;
        $chatter->vpf_id = $user->vpf->id;
        $chatter->group_id = $group_id;
        $chatter->save();

        \Notification::success('Message added successfully');
        return redirect('/admin/groups/'.$group_id.'/mysquad');
    }

    public function addSquadAnnoucement($group_id, Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = \Auth()->user();

        if(!($user->hasRole(['nco','officer','superadmin'])))
        {
            \Notification::error('You do not have permission to add a Squad Announcement');
            return redirect('/admin/groups/'.$group_id.'/mysquad');
        }

        $announcement = new SquadAnnouncements;
        $announcement->message = $request->message;
        $announcement->vpf_id = $user->vpf->id;
        $announcement->group_id = $group_id;
        $announcement->save();

        \Notification::success('Squad Announcement added successfully');
        return redirect('/admin/groups/'.$group_id.'/mysquad');
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
