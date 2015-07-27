<?php

namespace App\Http\Controllers\Backend;

use App\Application;
use App\ApplicationsArchive;
use App\VPF;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apps = Application::where('status','=','Under Review')->Paginate(30);
        return view('backend.applications.index')->with('apps',$apps);
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
        $app = Application::findOrFail($id);
        $user = \Auth::user();
        return view('backend.applications.show')->with('app',$app);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $app = Application::findOrFail($id);
        $user = \Auth::user();
        return view('backend.applications.edit')->with('app',$app);
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
        $filingUser = \Auth::User();
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'steam_id' => '',
            'dob' => 'required|date',
            'nationality' => 'required',
            'email' => 'required|email',
            'milsim_experience' => 'required',
            'milsim_badconduct' => 'required',
            'milsim_grouplist' => '',
            'milsim_highestrank' => '',
            'milsim_previoustraining' => '',
            'milsim_depature' => '',
            'agreement_milsim' => 'required',
            'agreement_guidelines' => 'required',
            'agreement_orders' => 'required',
            'agreement_ranks' => 'required',
            'signature' => 'required|string',
            'signature_date' => 'required',
            'processed_name' => 'required|string',
            'processed_paygrade' => 'required',
            'processed_unitname' => 'required',
            'processed_signature' => 'required'
        ]);
        $time= new \Datetime($request->dob);

        $app = Application::find($id);
        $app->user_id = $request->user_id;
        $app->first_name = ucfirst(strtolower($request->first_name));
        $app->last_name = ucfirst(strtolower($request->last_name));
        $app->dob = $time->format('Y-m-d H:i:s');
        $app->nationality = $request->nationality;
        $app->milsim_experience = $request->milsim_experience;
        $app->milsim_badconduct = $request->milsim_badconduct;
        $app->milsim_grouplist = $request->milsim_grouplist;
        $app->milsim_highestrank = $request->milsim_highestrank;
        $app->milsim_previoustraining = $request->milsim_previoustraining;
        $app->milsim_depature = $request->milsim_depature;
        $app->agreement_milsim = $request->agreement_milsim;
        $app->agreement_guidelines = $request->agreement_guidelines;
        $app->agreement_orders = $request->agreement_orders;
        $app->agreement_ranks = $request->agreement_ranks;
        $app->signature = ucwords(strtolower($request->signature));
        $app->signature_date = $request->signature_date;
        $app->processed_name = ucwords(strtolower($request->processed_name));
        $app->processed_paygrade = $request->processed_paygrade;
        $app->processed_unitname = $request->processed_unitname;
        $app->processed_signature = $request->processed_signature;
        $app->save();
        \Log::info('Application Modified', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);


        \Notification::success('Enlistment form has been updated.');
        return redirect('/admin/enlistments/'.$id);
    }

    public function approve(Request $request, $id)
    {
        $filingUser = \Auth::User();

        $app = Application::find($id);
        $app->status = 'Accepted';
        $app->decision_name = $filingUser->vpf->last_name.', '.$filingUser->vpf->first_name;
        $app->decision_paygrade = $filingUser->vpf->rank->pay_grade;
        $app->decision_unitname = '1st Rapid Response Force Command Element';
        $app->decision_signature = $filingUser->vpf->first_name.' '.$filingUser->vpf->last_name;
        $app->decision_date = \Carbon\Carbon::now()->toDateTimeString();
        $app->processed_statement = $request->statement;


        //Find VPF or create new
        if(is_null($app->user->vpf_id))
        {
            $vpf = new VPF;
            $vpf->first_name = $app->first_name;
            $vpf->last_name = $app->last_name;
            $vpf->user_id = $app->user->id;
            $vpf->assignment_id = $app->assignment_id;
            $vpf->rank_id = '2';
            $vpf->status = 'Active';
            $vpf->save();
        } else {
            $vpf = VPF::find($app->user->vpf_id);
            $vpf->first_name = $app->first_name;
            $vpf->first_name = $app->last_name;
            $vpf->user_id = $app->user->id;
            $vpf->assignment_id = $app->assignment_id;
            $vpf->rank_id = '2';
            $vpf->status = 'Active';
            $vpf->save();
        }
        //Associate New Personnel File to User
        $app->user->vpf_id = $vpf->id;

        // Deal with Roles - Ghetto Style
        foreach($app->user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $app->user->detachRole($getRole);
        }
        $memberRole = Role::where('name','member')->first();
        $app->user->attachRole($memberRole);
        $app->push();
        \Log::info('Application Accepted', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);
        \Notification::success('Accepted Member, form has been set to read only and user has been notified.');
        return redirect('/admin/enlistments/'.$id);

    }

    public function reject(Request $request, $id)
    {
        $filingUser = \Auth::User();

        $app = Application::find($id);
        $app->status = 'Rejected';
        $app->decision_name = $filingUser->vpf->last_name.', '.$filingUser->vpf->first_name;
        $app->decision_paygrade = $filingUser->vpf->rank->pay_grade;
        $app->decision_unitname = '1st Rapid Response Force Command Element';
        $app->decision_signature = $filingUser->vpf->first_name.' '.$filingUser->vpf->last_name;
        $app->decision_date = \Carbon\Carbon::now()->toDateTimeString();
        $app->processed_statement = $request->statement;
        $app->save();

        \Log::info('Application Rejected', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);
        \Notification::success('Rejected Member, form has been set to read only and user has been notified.');
        return redirect('/admin/enlistments/'.$id);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function accepted()
    {
        $apps = Application::where('status','=','Accepted')->Paginate(30);
        return view('backend.applications.index-accepted')->with('apps',$apps);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function rejected()
    {
        $apps = Application::where('status','=','Rejected')->Paginate(30);
        return view('backend.applications.index')->with('apps',$apps);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $filingUser = \Auth::User();
        $app = Application::find($id);
        $user = User::find($app->user->id);

        //Reset User Model
        $user->application_id = NULL;

        //If an application was destroyed the user either
        // Left and rejoined
        // Messed up his application
        // Reenlisted
        // Meaning the assignment if they for some reason have an assignment (already accepted, it needs to be cleared)
        if (!is_null($user->vpf_id))
        {
            $user->vpf->assignment_id = NULL;
        }
        $user->push();

        // Deal with Roles - Ghetto Style
        foreach($app->user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $app->user->detachRole($getRole);
        }

        //Reset Permissions to User
        $memberRole = Role::where('name','user')->first();
        $app->user->attachRole($memberRole);
        $app->delete();

        \Log::info('Application Deleted', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);
        \Notification::success('Application has been archived, user can refile.');
        return redirect('/admin/enlistments/');



    }
}
