<?php

namespace App\Http\Controllers\Frontend;

use App\SquadAnnouncements;
use App\SquadChatter;
use App\UnitAnnouncements;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class mySquadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth()->user();
        $chatter = SquadChatter::where('group_id','=',$user->vpf->assignment->group->id)->orderBy('created_at','desc')->Paginate(15);
        $unitAnnouncements = UnitAnnouncements::all()->sortByDesc('created_at')->take(2);
        return view('frontend.my-squad.index')
            ->with('user',$user)
            ->with('unitAnnouncements', $unitAnnouncements)
            ->with('chatter',$chatter);
    }

    /**
     * Stores the Chatter Comment
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function addChatter(Request $request)
    {
        $this->validate($request, [
            'chatter' => 'required',
        ]);
        $user = \Auth()->user();

        $chatter = new SquadChatter;
        $chatter->message = $request->chatter;
        $chatter->vpf_id = $user->vpf->id;
        $chatter->group_id = $user->vpf->assignment->group->id;
        $chatter->save();

        \Notification::success('Message added successfully');
        return redirect('/my-squad');

    }

    /**
     * Show the form for editing the chatter resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editChatter($id)
    {
        $user = \Auth()->user();
        $chatter = SquadChatter::find($id);

        if(!($chatter->vpf_id == $user->vpf->id))
        {
            \Notification::error('You cannot edit a chatter comment that is not yours');
            return redirect('/my-squad');
        }

        return view('frontend.my-squad.chatterEdit')
            ->with('user',$user)
            ->with('chatter',$chatter);
    }

    /**
     * Updates the Chatter based on id
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateChatter(Request $request, $id)
    {
        $user = \Auth()->user();
        $chatter = SquadChatter::find($id);

        if(!($chatter->vpf_id == $user->vpf->id))
        {
            \Notification::error('You cannot edit a chatter comment that is not yours');
            return redirect('/my-squad');
        }

        $chatter->message = $request->chatter;
        $chatter->save();

        \Notification::success('Message modified successfully');
        return redirect('/my-squad');
    }


    public function indexSquadAnnouncement()
    {
        $user = \Auth()->user();
        $ann = SquadAnnouncements::where('group_id','=',$user->vpf->assignment->group->id)->paginate(10);

        return view('frontend.my-squad.indexSquadAnnouncements')
            ->with('user',$user)
            ->with('ann',$ann);
    }

    /**
     * Stores the Chatter Comment
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function addSquadAnnouncement(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        $user = \Auth()->user();

        if(!($user->hasRole(['nco','officer','superadmin'])))
        {
            \Notification::error('You do not have permission to add a Squad Announcement');
            return redirect('/my-squad');
        }

        $announcement = new SquadAnnouncements;
        $announcement->message = $request->message;
        $announcement->vpf_id = $user->vpf->id;
        $announcement->group_id = $user->vpf->assignment->group->id;
        $announcement->save();

        \Notification::success('Squad Announcement added successfully');
        return redirect('/my-squad');

    }

    /**
     * Edit Squad Announcement
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function editSquadAnnouncement($id)
    {
        $user = \Auth()->user();

        if(!($user->hasRole(['nco','officer','superadmin'])))
        {
            \Notification::error('You do not have permission to edit a Squad Announcement');
            return redirect('/my-squad');
        }
        $ann = SquadAnnouncements::find($id);

        return view('frontend.my-squad.squadAnnouncementEdit')
            ->with('user',$user)
            ->with('announcement',$ann);

    }

    /**
     * Update Squad Announcement
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function updateSquadAnnouncement(Request $request, $id)
    {
        $user = \Auth()->user();
        $ann = SquadAnnouncements::find($id);

        if(!($user->hasRole(['nco','officer','superadmin'])))
        {
            \Notification::error('You do not have permission to edit a Squad Announcement');
            return redirect('/my-squad');
        }

        $ann->message = $request->chatter;
        $ann->save();

        \Notification::success('Message modified successfully');
        return redirect('/my-squad');
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
