<?php

namespace App\Http\Controllers\Backend;

use App\Discharge;
use App\Operation;
use App\Qualification;
use App\Rank;
use App\Ribbon;
use App\School;
use App\Service_History;
use App\User;
use App\VPF;
use App\Role;
use App\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Modules\Teamspeak\TeamspeakContract;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VPFController extends Controller
{
    /**
     * @var TeamspeakContract
     */
    protected $ts;

    /**
     * @param TeamspeakContract $ts
     */
    public function __construct(TeamspeakContract $ts){
        $this->ts = $ts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::User();
        $vpfs = VPF::all();

        return view('backend.vpf.index')
            ->with('user',$user)
            ->with('vpfs', $vpfs);
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
        $user = \Auth::User();

        $vpf = VPF::findorFail($id);
        $ranks = Rank::all();
        $users = User::all();
        $ribbons = Ribbon::all();
        $schools = School::all();
        $operations = Operation::all();
        $qualifications = Qualification::all();
        $assignments = $this->AssignmentList($vpf->id);

        $forms = collect();
        $forms = $forms->merge($vpf->article15);
        $forms = $forms->merge($vpf->vcs);
        $forms = $forms->merge($vpf->ncs);
        $forms = $forms->merge($vpf->dcs);
        $forms = $forms->merge($vpf->discharges);
        $forms = $forms->merge($vpf->file_corrections);
        $forms = $forms->merge($vpf->assignment_changes);
        $forms = $forms->sortByDesc('created_at');

        $buildProfile = collect(
            ['serviceHistory'=>$vpf->serviceHistory->sortByDesc('date'),
                'ribbons'=>$vpf->ribbons,
                'qualifications'=>$vpf->qualifications,
                'operations'=>$vpf->operations,
                'schools'=>$vpf->schools()->wherePivot('completed', '=','1')->get(),
                'forms'=> $forms,
            ]);

        return view('backend.vpf.show')
            ->with('user',$user)
            ->with('vpf',$vpf)
            ->with('ranks',$ranks)
            ->with('users',$users)
            ->with('ribbons',$ribbons)
            ->with('assignments', $assignments)
            ->with('schools',$schools)
            ->with('operations',$operations)
            ->with('qualifications',$qualifications)
            ->with('profile',$buildProfile);
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
        $VPF = VPF::find($id);
        switch ($request->form_type) {
            case 'addServiceHistory':
                $this->addServiceHistory($VPF,$request->serviceHistoryNote,$request->serviceHistoryDate);
                \Notification::success('Service History added successfully');
                break;
            case 'addRibbon':
                $this->addRibbon($VPF,$request->ribbons,$request->dateAwarded);
                \Notification::success('Ribbon added successfully');
                break;
            case 'addQualifications':
                $this->addQualification($VPF,$request->qualifications,$request->dateAwarded);
                \Notification::success('Qualification added successfully');
                break;
            case 'addOperations':
                $this->addOperation($VPF,$request->operations);
                \Notification::success('Operation added successfully');
                break;
            case 'addSchools':
                $this->addSchools($VPF,$request->schools,$request->completed,$request->dateAttended);
                \Notification::success('School added successfully');
                break;
            case 'profile':
                $this->saveProfile($VPF,$request);
                \Notification::success('Saving Profile');
                break;
        }

        return redirect('/admin/vpf/'.$VPF->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        \Notification::error('You cannot delete a VPF profile per Unit Policy');
        return redirect('/admin/vpf');
    }

    /**
     * Shows the Promote User interface
     * @param $vpf_id
     * @return $this
     */
    public function showPromoteUser($vpf_id)
    {
        $vpf = VPF::find($vpf_id);
        $ranks = Rank::all();
        return view('backend.vpf.promote')
            ->with('vpf',$vpf)
            ->with('ranks',$ranks);
    }

    /**
     * Process the promote user request
     * @param $vpf_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function PromoteUser($vpf_id, Request $request)
    {
        $vpf = VPF::find($vpf_id);
        $newRank = Rank::find($request->newRank);

        $vpf->promotions()->create([
            'old_rank_id' => $vpf->rank->id,
            'new_rank_id' => $newRank->id
        ]);

        //Add Service History
        $vpf->serviceHistory()->create([
            'note' => 'Promoted from '.$request->oldRank.' to '.$newRank->name,
            'date'=> Carbon::now()
        ]);

        $vpf->rank_id = $newRank->id;
        $vpf->save();

        $user = User::find($vpf->user->id);
        $this->ts->update($user);

        \Notification::success('Member was promoted!');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Shows the reassign member interface
     * @param $vpf_id
     * @return $this
     */
    public function showReassignMember($vpf_id)
    {
        $vpf = VPF::find($vpf_id);
        $assignments = $this->AssignmentList($vpf->id);
        return view('backend.vpf.reassign')
            ->with('vpf',$vpf)
            ->with('assignments',$assignments);
    }

    /**
     * Processes the reassign member request
     * @param $vpf_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function reassignMember($vpf_id, Request $request)
    {
        $vpf = VPF::find($vpf_id);
        $newAssignment = Assignment::find($request->newAssignment);

        //Add Service History
        $vpf->serviceHistory()->create([
            'note' => 'Reassigned from '.$vpf->assignment->name.' to '.$newAssignment->name,
            'date'=> Carbon::now()
        ]);

        $vpf->assignment_id = $newAssignment->id;
        $vpf->save();


        \Notification::success('Member was reassigned!');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Shows the discharge member interface
     * @param $vpf_id
     * @return $this
     */
    public function showDischargeMember($vpf_id)
    {
        $vpf = VPF::find($vpf_id);
        return view('backend.vpf.discharge')
            ->with('vpf',$vpf);
    }

    /**
     * Processes the reassign member request
     * @param $vpf_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function dischargeMember($vpf_id, Request $request)
    {
        $vpf = VPF::find($vpf_id);
        $vpfUser = User::find($vpf->user->id);
        $user = \Auth::User();

        //Discharge Self Exception
        if ($vpf->id == $user->id)
        {
            \Notification::error('You cannot discharge yourself');
            return redirect('/admin/vpf/'.$vpf_id);
        }

        //Create Discharge Form
        $dis = new Discharge;
        $dis->vpf_id = $vpf->id;
        $dis->name = $vpf->last_name.', '.$vpf->first_name;
        $dis->grade = $vpf->rank->pay_grade;
        $dis->discharge_type = $request->discharge_type;
        $dis->discharge_text = $request->discharge_text;
        $dis->discharger_name = $user->vpf->last_name.', '.$user->vpf->first_name;
        $dis->discharger_grade = $user->vpf->rank->pay_grade;
        $dis->discharger_signature = $user->vpf->first_name.' '.$user->vpf->last_name;
        $dis->save();


        //Add Service History
        $vpf->serviceHistory()->create([
            'note' => 'Discharged from the 1st RRF - '.$request->discharge_type,
            'date'=> Carbon::now()
        ]);


        //Set Rank and Assignment
        $vpf->rank_id = 1; //No Rank
        $vpf->assignment_id = 157; //Civ
        $vpf->save();

        // Deal with Roles - Ghetto Style
        foreach($vpf->user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $vpfUser->detachRole($getRole);
        }
        //Add simple role
        $getRole = Role::find(5);
        $vpfUser->attachRole($getRole);

        $vpf->push();

        $user = User::find($vpf->user->id);

        if($request->discharge_type != 'Dishonorable Discharge')
        {
            // Email User
            $data = [
                'discharge_type'=>$request->discharge_type,
            ];

            $this->emailDischarge($vpf->user,$data);

            //Update user on Teamspeak
            $this->ts->update($user);
        } else {
            $data = [
                'discharge_type'=>$request->discharge_type,
            ];

            //Email user dishonorable discharge email
            $this->emailDishonorableDischarge($vpf->user,$data);

            //Ban user on Teamspeak
            $this->ts->ban($vpfUser);
        }



        \Notification::success('Member was Discharged from the unit!');
        return redirect('/admin/vpf/'.$vpf_id);
    }


    /**
     * Deletes a Service History Request based on VPF_ID and Service History ID
     * @param $vpf_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function destroyServiceHistory($vpf_id,$id)
    {
        $serviceHistory = Service_History::find($id);
        $serviceHistory->delete();
        \Notification::success('Service History entry deleted');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Deletes a Qualification attached to a user based on VPF_ID and Qualification ID
     * @param $vpf_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function destroyQualification($vpf_id,$id)
    {
        $vpf = VPF::find($vpf_id);
        $qual = Qualification::find($id);
        $vpf->qualifications()->detach($qual->id);
        \Notification::success('Qualification record deleted');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Deletes a Operation attached to a user based on the VPF_ID and Qualification ID
     * @param $vpf_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function destroyOperation($vpf_id,$id)
    {
        $vpf = VPF::find($vpf_id);
        $qual = Operation::find($id);
        $vpf->operations()->detach($qual->id);
        \Notification::success('Operation record deleted');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Deletes a School attached to a user based on the VPF_ID and the School ID
     * @param $vpf_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function destroySchool($vpf_id,$id)
    {
        $vpf = VPF::find($vpf_id);
        $qual = School::find($id);
        $vpf->schools()->detach($qual->id);
        \Notification::success('School record deleted');
        return redirect('/admin/vpf/'.$vpf_id);
    }

    /**
     * Compiles a list of all available assignments based on available and those marked as initial assignments
     * @return \Illuminate\Support\Collection
     */
    private function AssignmentList($vpf)
    {
        //Variable Declaration
        $assignments = Assignment::all();
        $vpf = VPF::find($vpf);

        //deal with current Assignment profile glitch
        $currentAssignment = $vpf->assignment;
        $availableForEnlistment = collect();
        $availableForEnlistment->push($currentAssignment);


        //Iterate through all assignments to determine all available Assignments
        foreach($assignments as $assignment)
        {
            //Check if anyone else has this ID
            $assignmentCheck = VPF::where('assignment_id',$assignment->id)->first();
            //If No One has it, add the model to a collection
            if (is_null($assignmentCheck)) {
                $availableForEnlistment->push($assignment);
            }
        }


        //Return list of unique MOS's, lets return a collection of MOS models for the page
        return $availableForEnlistment;
    }


    /**
     * Adds a Service History Entry
     * @param $user
     * @param $service_history
     * @param string $date
     */
    private function addServiceHistory($user,$service_history, $date = '2015-09-01')
    {
        $user->serviceHistory()->create([
            'note' => $service_history,
            'date' => $date
        ]);
    }

    /**
     * Adds a Ribbon to user's VPF
     * @param $user
     * @param $ribbon
     * @param string $date
     */
    private function addRibbon($user,$ribbon,$date = '2015-09-01')
    {
        $user->ribbons()->attach([
            $ribbon =>['date_awarded' => $date]
        ]);
    }

    /**
     * Adds a Operation to User's VPF
     * @param $user
     * @param $operation
     */
    private function addOperation($user,$operation)
    {
        $user->operations()->attach($operation);
    }

    /**
     * Adds a Qualification to User's VPF
     * @param $user
     * @param $qualification
     * @param string $date
     */
    private function addQualification($user,$qualification,$date = '2015-09-01')
    {
        $user->qualifications()->attach([
            $qualification => ['date_awarded' => $date]
        ]);
    }

    /**
     * Add's a School to User's VPF
     * @param $user
     * @param $school
     * @param $completed
     * @param string $date
     */
    private function addSchools($user,$school,$completed ,$date = '2015-09-01')
    {
        $user->schools()->attach([
            $school => ['date_attended' => $date, 'completed' => $completed]
        ]);
    }

    /**
     * Hard Save of the User profile, does not do any additional process, simply stores fields
     * @param $user
     * @param $input
     */
    private function saveProfile($user,$input)
    {
        $user->first_name = $input->first_name;
        $user->last_name = $input->last_name;
        $user->user_id = $input->user_id;
        $user->face_id = $input->face_id;
        $user->rank_id = $input->rank_id;
        $user->status = $input->status;
        $user->clearance = $input->clearance;
        $user->assignment_id = $input->assignment_id;
        $user->push();

        $u = $user->user;

        try {
            $this->ts->update($u);
        } catch (QueryException $e) {
        // Do Nothing
        }

    }


    /**
     * Sends email to User regarding Discharges
     * @param $user
     * @param $data
     */
    private function emailDischarge($user,$data)
    {
        Mail::send('emails.discharge', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Discharge');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }

    /**
     * Sends email to User regarding Discharges
     * @param $user
     * @param $data
     */
    private function emailDishonorableDischarge($user,$data)
    {
        Mail::send('emails.dishonorableDischarge', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Dishonorable Discharge');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
