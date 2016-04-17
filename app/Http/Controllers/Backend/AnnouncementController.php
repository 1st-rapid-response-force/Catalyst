<?php

namespace App\Http\Controllers\Backend;

use App\UnitAnnouncements;
use App\VPF;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $announce = UnitAnnouncements::orderBy('created_at','desc')->get();
        return view('backend.announcements.index')
            ->with('announcements',$announce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate Form
        $this->validate($request, [
            'subject' => 'required|string',
            'short_message' => 'required|string',
            'message' => 'required|string',
        ]);
        $user = \Auth::User();

        $announce = new UnitAnnouncements;
        $announce->vpf_id = $user->vpf->id;
        $announce->subject = $request->subject;
        $announce->short_message = $request->short_message;
        $announce->message = $request->message;
        $announce->save();

        // Email User
        $data = [
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];

        // Email everyone
        $all = VPF::where('status','=','Active')->get();
        foreach($all as $u)
        {
            $this->emailAnnounce($u->user,$data);
        }


        \Notification::success('Announcement has been added and emailed.');
        return redirect('/admin/announcements');
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
        $announce = UnitAnnouncements::find($id);
        return view('backend.announcements.edit')
            ->with('announcement',$announce);
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
        // Validate Form
        $this->validate($request, [
            'subject' => 'string',
            'short_message' => 'string',
            'message' => 'string',
        ]);
        $user = \Auth::User();

        $announce = UnitAnnouncements::find($id);
        $announce->vpf_id = $user->vpf->id;
        $announce->subject = $request->subject;
        $announce->short_message = $request->short_message;
        $announce->message = $request->message;
        $announce->save();

        \Notification::success('Announcement has been updated.');
        return redirect('/admin/announcements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $announce = UnitAnnouncements::find($id);
        $announce->delete();
        \Notification::success('Announcement has been deleted.');
        return redirect('/admin/announcements');
    }

    /**
     * Sends email to user - Approve
     * @param $user
     * @param $data
     */
    private function emailAnnounce($user,$data)
    {
        Mail::queue('emails.announcement', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - '.$data['subject']);
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
