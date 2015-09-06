<?php

namespace App\Http\Controllers\Backend;

use App\Perstat;
use Carbon\Carbon;
use Mail;
use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerstatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $perstats = Perstat::all();

        // Deal with new PERSTAT Logic
        $perstatOld = Perstat::where('active','=','1')->first();
        $date = Carbon::createFromFormat('Y-m-d', $perstatOld->to);
        $date->hour= 0;
        $date->minute = 0;
        $date->second = 0;
        $now = Carbon::now();

        //Determine whether to show button
        if($now->gt($date))
        {
            $validNew = true;
        } else {
            $validNew = false;
        }

        return view('backend.perstat.index')
            ->with('perstats', $perstats)
            ->with('validNew',$validNew)
            ->with('oldPerstat',$perstatOld);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Set old perstat to active
        $perstatOld = Perstat::where('active','=','1')->first();
        $perstatOld->active = false;
        $perstatOld->save();

        $now = Carbon::now();

        //New Perstat
        $assigned = VPF::where('status','=','Active')->get()->count();
        $perstat = new Perstat;
        $perstat->from = $now->toDateString();
        $perstat->to = $now->addWeek(1)->toDateString();
        $perstat->assigned = $assigned;
        $perstat->active = true;
        $perstat->save();

        \Notification::success('PERSTAT added successfully');
        return redirect('/admin/perstat');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $perstat = Perstat::find($id);
        return view('backend.perstat.show')
            ->with('perstat',$perstat);
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
        \Notification::error('You cannot delete a PERSTAT, probably shouldnt include this option... well then');
        return redirect('/admin/perstat');
    }

    public function emailAllPending(Request $request, $id)
    {
        $perstat = Perstat::find($id);
        $pending = $perstat->pendingReportIn();

        foreach($pending as $vpf)
        {
            $this->emailReportIn($vpf->user);
        }

        \Notification::success('Emails have been sent to pending members');
        return redirect('/admin/perstat/'.$perstat->id);
    }

    /**
     * Sends email to user - Notify Report in
     * @param $user
     * @param $data
     */
    private function emailReportIn($user)
    {
        Mail::send('emails.reportIn', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Report In');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
