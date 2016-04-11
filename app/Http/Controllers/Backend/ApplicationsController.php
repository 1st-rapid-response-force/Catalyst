<?php

namespace App\Http\Controllers\Backend;

use Mail;
use App\Application;
use App\Assignment;
use App\Qualification;
use App\Service_History;
use App\VPF;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $app = Application::findOrFail($id);
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
        //Read only check
        if(!($app->status == 'Under Review'))
        {
            \Notification::warning('Application is read only');
            return redirect('/admin/enlistments/'.$id);
        }

        // Get all assignments that are available
        $assignments = $this->AssignmentList();
        return view('backend.applications.edit')
            ->with('app',$app)
            ->with('assignments',$assignments);
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
        $app = Application::find($id);

        //Read only CHECK to prevent editing
        if(!($app->status == 'Under Review'))
        {
            \Notification::warning('Application is read only');
            return redirect('/admin/enlistments/'.$id);
        }

        // Pull User Making the Modification
        $filingUser = \Auth::User();

        // Validate the form
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

        //Convert the time for database storage
        $time= new \Datetime($request->dob);

        //Update Application
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

        //Log change
        \Log::info('Application Modified', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);

        //Return user to Edit View
        \Notification::success('Enlistment form has been updated.');
        return redirect('/admin/enlistments/'.$id.'/edit');
    }

    public function approve(Request $request, $id)
    {
        // Pull User Making the Modification
        $filingUser = \Auth::User();

        //Find the application and add Enlistment Decision based on User making the Approval
        $app = Application::find($id);
        $app->status = 'Accepted';
        $app->decision_name = $filingUser->vpf->last_name.', '.$filingUser->vpf->first_name;
        $app->decision_paygrade = $filingUser->vpf->rank->pay_grade;
        $app->decision_unitname = '1st Rapid Response Force - Command Element';
        $app->decision_signature = $filingUser->vpf->first_name.' '.$filingUser->vpf->last_name;
        $app->decision_date = Carbon::now()->toDateTimeString();
        $app->processed_statement = $request->statement;

        /*
         * Logic Check - the system will now determine if the user already has a Virtual Personnel File
         * VPF doesn't exist - create one with the assignment position given by the approving party - assignment_id is assigned
         * VPF exists - update previous one with new assignment id, set rank to PV1 (re-enlistments)
         *
         * This is the first section were the assignment_id is introduced as the officer will select the best possible position
         * for the member
         */
        //Find VPF or create new
        if(is_null($app->user->vpf_id))
        {
            $vpf = new VPF;
            $vpf->first_name = $app->first_name;
            $vpf->last_name = $app->last_name;
            $vpf->user_id = $app->user->id;
            //// Assigned Recruit Assignment
            $vpf->assignment_id = 156;
            $vpf->rank_id = '2';
            $vpf->status = 'Active';
            $vpf->save();

            //First time associate of VPF file with user
            $app->user->vpf_id = $vpf->id;
        } else {
            $vpf = VPF::find($app->user->vpf_id);
            $vpf->first_name = $app->first_name;
            $vpf->first_name = $app->last_name;
            $vpf->user_id = $app->user->id;
            //// Assigned Recruit Assignment
            $vpf->assignment_id = 156;
            $vpf->rank_id = '2';
            $vpf->status = 'Active';
            $vpf->save();
        }


        // Purge Roles and reassign base member role
        foreach($app->user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $app->user->detachRole($getRole);
        }
        $memberRole = Role::where('name','member')->first();
        $app->user->attachRole($memberRole);

        //Add user to Basic Training Course
        $vpf->schools()->attach([
            1 => ['completed' => 0],
        ]);

        //Add Army Service Ribbon
        $vpf->ribbons()->attach([
            1 => ['date_awarded' => Carbon::now()],
        ]);

        //Adds base level qualification for My Loadout
        $rrfQualification = Qualification::where('name','=','1st RRF - Member')->first();
        $vpf->qualifications()->attach([
            $rrfQualification->id => ['date_awarded' => Carbon::now()],
        ]);

        //Give loadout of Nulls
        $vpf->loadout()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]);

        //Add Service History
        $vpf->serviceHistory()->create([
            'note' => 'Enlisted in the 1st Rapid Response Force',
            'date'=> Carbon::now()
        ]);

        //Sync all changes
        $app->push();

        // Email User
        $data = [
            'name'=>$vpf,
            'steam_id'=>$vpf->user->steam_id
        ];
        $this->emailApprove($app->user,$data);

        \Artisan::queue('images:avatars');
        \Artisan::queue('images:cac');

        //Log action by Approving member
        \Log::info('Application Accepted', ['user_id'=> $filingUser->id, 'app_id'=>$app->id]);

        //Redirect user and notify them that the file is read only
        \Notification::success('Accepted Member, form has been set to read only and user has been notified.');
        return redirect('/admin/enlistments/'.$id);

    }

    public function reject(Request $request, $id)
    {
        $filingUser = \Auth::User();

        //Find the application and add Enlistment Decision based on User making the Approval
        $app = Application::find($id);
        $app->status = 'Rejected';
        $app->decision_name = $filingUser->vpf->last_name.', '.$filingUser->vpf->first_name;
        $app->decision_paygrade = $filingUser->vpf->rank->pay_grade;
        $app->decision_unitname = '1st Rapid Response Force Command Element';
        $app->decision_signature = $filingUser->vpf->first_name.' '.$filingUser->vpf->last_name;
        $app->decision_date = Carbon::now()->toDateTimeString();
        $app->processed_statement = $request->statement;
        $app->save();

        // Email User
        $data = [];
        $this->emailReject($app->user,$data);

        /*
         * Logic Check -
         * New Applicants - no VPF has every been created, meaning no clean up is needed
         * Re-enlisting members - VPF file exists, however they would have been discharged losing all access and roles
         * this would mean that since the application is not reassigning any permissions, they would remain discharged.
         * and per Policy, we would retain their file
         */

        //Redirect User
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
        // Pull User Making the Modification
        $filingUser = \Auth::User();

        //Pull information relating to both users
        $app = Application::find($id);
        $oldapp = $app->id;
        $user = User::find($app->user->id);

        /*
         * Logic Check -
         * Deleting the application any actions taken by completing it are reversed
         * This means roles are reversed
         * - Assignment ID in the VPF is NULLED - if user has a VFD (accepted or reenlistment)
         * - Application ID in the User model is NULLED
         * - Application is archived (soft delete)
         */

        // Purge Roles and reassign base member role
        foreach($user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $user->detachRole($getRole);
        }
        $userRole = Role::where('name','user')->first();
        $user->attachRole($userRole);

        // Clear the application_id to allow user to refile his/her enlistment paperwork
        $user->application_id = NULL;


        // Determine if vpf_id exists, if so clear it
        if (!is_null($user->vpf_id))
        {
            $user->vpf->assignment_id = NULL;
        }

        //Log action by Approving member
        $user->push();
        $app->delete();

        //Redirect user to index and notify them of the changes
        \Log::info('Application Deleted', ['user_id'=> $filingUser->id, 'app_id'=>$oldapp]);
        \Notification::success('Application has been archived, user can refile.');
        return redirect('/admin/enlistments/');
    }
    /**
     * Compiles a list of all available assignments based on available and those marked as initial assignments
     * @return \Illuminate\Support\Collection
     */
    private function AssignmentList()
    {
        //Variable Declaration
        $assignments = Assignment::all();
        $availableForEnlistment = collect();

        //Iterate through all assignments to determine all available Assignments
        foreach($assignments as $assignment)
        {
            //Check if anyone else has this ID
            $assignmentCheck = VPF::where('assignment_id',$assignment->id)->first();
            //If No One has it, add the model to a collection
            if (is_null($assignmentCheck) && ($assignment->entry_level == 1)) {
                $availableForEnlistment->push($assignment);
            }
        }
        //Return list of unique MOS's, lets return a collection of MOS models for the page
        return $availableForEnlistment;
    }

    /**
     * Sends email to user - Approve
     * @param $user
     * @param $data
     */
    private function emailApprove($user,$data)
    {
        Mail::send('emails.applicationApprove', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Your Application has been accepted');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }

    /**
     * Sends email to user - Reject
     * @param $user
     * @param $data
     */
    private function emailReject($user,$data)
    {
        Mail::send('emails.applicationReject', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, 'User');
            $m->subject('1st RRF - Your Application has been declined');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }

}
