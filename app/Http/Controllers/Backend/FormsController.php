<?php

namespace App\Http\Controllers\Backend;

use App\Assignment;
use App\AssignmentChange;
use App\ClassCompletion;
use App\School;
use App\User;
use App\Article15;
use App\DCS;
use App\Discharge;
use App\FileCorrection;
use App\InfractionReport;
use App\NCS;
use App\VCS;
use App\VPF;
use Mail;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Modules\Teamspeak\TeamspeakContract;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FormsController extends Controller
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
     * Shows Form Manager index
     */
    public function index()
    {
        $user = \Auth::User();

        $discharges = Discharge::where('discharge_type','=','PENDING REVIEW')->get();
        $vpf_cr = FileCorrection::where('reviewed','=',0)->get();
        $infractions = InfractionReport::where('reviewed','=',0)->get();
        $assignment_changes = AssignmentChange::where('reviewed','=',0)->get();
        $class_completion = ClassCompletion::where('status','=',2)->get();

        $forms = collect();
        $forms = $forms->merge($discharges);
        $forms = $forms->merge($vpf_cr);
        $forms = $forms->merge($infractions);
        $forms = $forms->merge($assignment_changes);
        $forms = $forms->merge($class_completion);

        return view('backend.forms.index')
            ->with('forms',$forms)
            ->with('user',$user);
    }

    /**
     * Shows Form Manager index - archive (all)
     */
    public function all()
    {
        $user = \Auth::User();

        $discharges = Discharge::all();
        $vpf_cr = FileCorrection::all();
        $infractions = InfractionReport::all();
        $assignment_changes = AssignmentChange::all();
        $class_completion = ClassCompletion::all();

        $forms = collect();
        $forms = $forms->merge($discharges);
        $forms = $forms->merge($vpf_cr);
        $forms = $forms->merge($infractions);
        $forms = $forms->merge($assignment_changes);
        $forms = $forms->merge($class_completion);

        return view('backend.forms.all')
            ->with('forms',$forms)
            ->with('user',$user);
    }

    public function newForm($vpf_id,$type)
    {
        $vpf = VPF::find($vpf_id);
        $user = \Auth::User();
        switch($type)
        {
            case 'article15':
                return view('backend.forms.new.article15')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'ncs':
                return view('backend.forms.new.ncs')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'vcs':
                return view('backend.forms.new.vcs')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'dcs':
                return view('backend.forms.new.dcs')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'class-completion':
                break;
            case 'discharge':
                break;
            default:
                abort(404);
                break;
        }
    }

    public function storeForm($vpf_id,$type, Request $request)
    {
        $vpf = VPF::find($vpf_id);
        $user = \Auth::User();
        switch($type)
        {
            case 'article15':
                $vpf->article15()->create([
                   'name' => $request->name,
                    'grade' => $request->grade,
                    'military_id' => $request->military_id,
                    'current_date' => $request->current_date,
                    'misconduct' => $request->misconduct,
                    'plea' => $request->plea,
                    'plan_of_action' => $request->plan_of_action,
                    'counselor_name' => $request->counselor_name,
                    'counselor_rank' => $request->counselor_rank,
                    'counselor_organization' => $request->counselor_organization,
                    'counselor_signature' => $request->counselor_signature,
                    'counselor_sig_date' => $request->counselor_sig_date,
                ]);
                \Notification::success('Article 15 filed.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'ncs':
                $vpf->ncs()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'organization' => $request->organization,
                    'counselor_name' => $request->counselor_name,
                    'summary_infraction' => $request->summary_infraction,
                    'action_plan' => $request->action_plan,
                    'approval' => $request->approval,
                    'commander_name' => $request->commander_name,
                    'commander_rank' => $request->commander_rank,
                    'commander_assignment' => $request->commander_assignment,
                    'approval_date' => $request->approval_date,
                ]);
                \Notification::success('NCS filed.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'vcs':
                $vpf->vcs()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'organization' => $request->organization,
                    'counselor_name' => $request->counselor_name,
                    'summary_interaction' => $request->summary_interaction,
                ]);
                \Notification::success('VCS filed.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'dcs':
                $vpf->dcs()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'organization' => $request->organization,
                    'counselor_name' => $request->counselor_name,
                    'reason_counseling' => $request->reason_counseling,
                    'key_points' => $request->key_points,
                    'plan_of_action' => $request->plan_of_action,
                    'assessment' => $request->assessment,
                    'assessment_date' => $request->assessment_date,
                ]);
                \Notification::success('DCS filed.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'class-completion':
                break;
            case 'discharge':
                break;
            default:
                abort(404);
                break;
        }
    }

    public function destroyForm($vpf_id,$type,$id)
    {
        $vpf = VPF::find($vpf_id);
        $user = \Auth::User();
        switch($type)
        {
            case 'article15':
                $form = Article15::find($id);
                $form->delete();
                \Notification::success('Article 15 deleted.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'ncs':
                $form = NCS::find($id);
                $form->delete();
                \Notification::success('NCS deleted.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'vcs':
                $form = VCS::find($id);
                $form->delete();
                \Notification::success('VCS deleted.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'dcs':
                $form = DCS::find($id);
                $form->delete();
                \Notification::success('DCS deleted.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            case 'class-completion':
                $form = ClassCompletion::find($id);
                $form->delete();
                \Notification::success('Class Completion Form deleted.');
                break;
            case 'discharge':
                $form = Discharge::find($id);
                $form->delete();
                \Notification::success('Discharge record deleted.');
                return redirect('/admin/vpf/'.$vpf->id);
                break;
            default:
                abort(404);
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($vpf_id,$type,$id)
    {
        $vpf = VPF::find($vpf_id);
        $user = \Auth::User();
        switch($type)
        {
            case 'discharge':
                $form = Discharge::find($id);
                return view('backend.forms.edit.discharge')->with('dis',$form);
                break;
            case 'vpf_cr':
                $form = FileCorrection::find($id);
                return view('backend.forms.edit.vpf_cr')->with('vpf_cr',$form);
                break;
            case 'ir':
                $form = InfractionReport::find($id);
                return view('backend.forms.edit.ir')->with('ir',$form);
                break;
            case 'assignment_change':
                $form = AssignmentChange::find($id);
                $assignmentList= $this->AssignmentListTransfer();
                return view('backend.forms.edit.assignment_change')->with('assignmentList',$assignmentList)->with('ac',$form);
                break;
                break;
            case 'class-completion':
                $form = ClassCompletion::find($id);

                $attendees = collect();
                $observers = collect();
                $helpers = collect();

                if(!empty($form->attendees))
                {
                    $attendees = User::find(explode(',',$form->attendees));
                }

                if(!empty($form->observers))
                {
                    $observers = User::find(explode(',',$form->observers));
                }

                if(!empty($form->helpers))
                {
                    $helpers = User::find(explode(',',$form->helpers));
                }

                return view('backend.forms.edit.class-completion')
                    ->with('form',$form)
                    ->with('attendees', $attendees)
                    ->with('observers', $observers)
                    ->with('helpers', $helpers);
                break;
            default:
                abort(404);
                break;
        }
    }

    /**
     * Deals with form edits
     *
     * @param  int  $id
     * @return Response
     */
    public function process($vpf_id,$type,$id, Request $request)
    {

        $vpf = VPF::find($vpf_id);
        $vpfUser = User::find($vpf->user->id);
        $user = \Auth::User();

        switch($type)
        {
            case 'discharge':
                $discharger = \Auth::User();
                $form = Discharge::find($id);
                $form->discharge_type = $request->discharge_type;
                $form->discharger_name = $discharger->vpf->last_name.', '.$discharger->vpf->first_name;
                $form->discharger_grade = $discharger->vpf->rank->pay_grade;
                $form->discharger_organization = '1st Rapid Response Force';
                $form->discharger_signature = $discharger->vpf->first_name.' '.$discharger->vpf->last_name;
                $form->save();

                if($request->discharge_type != 'Dishonorable Discharge')
                {
                    //Ensure we cancel Subscription on Discharge
                    if ($user->everSubscribed())
                    {
                        $vpfUser->subscription()->cancel();
                    }

                    // Email User
                    $data = [
                        'discharge_type'=>$request->discharge_type,
                    ];

                    $this->emailDischarge($vpf->user,$data);

                    //Add Service History
                    $vpf->serviceHistory()->create([
                        'note' => 'Discharged from the 1st RRF - '.$request->discharge_type,
                        'date'=> Carbon::now()
                    ]);

                    //Set Rank and Assignment
                    $vpf->rank_id = 1; //No Rank
                    $vpf->assignment_id = 157; //Civ
                    $vpf->status = $request->discharge_type;
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


                    //Update user on Teamspeak
                    $this->ts->update($vpfUser);
                } else {
                    $data = [
                        'discharge_type'=>$request->discharge_type,
                    ];

                    //Ensure we cancel Subscription on Discharge
                    if ($user->everSubscribed())
                    {
                        $vpfUser->subscription()->cancel();
                    }

                    //Add Service History
                    $vpf->serviceHistory()->create([
                        'note' => 'Discharged from the 1st RRF - '.$request->discharge_type,
                        'date'=> Carbon::now()
                    ]);

                    //Email user dishonorable discharge email
                    $this->emailDishonorableDischarge($vpf->user,$data);

                    //Set Rank and Assignment
                    $vpf->rank_id = 1; //No Rank
                    $vpf->assignment_id = 157; //Civ
                    $vpf->status = $request->discharge_type;
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

                    //Update user on Teamspeak
                    $this->ts->ban($vpfUser);
                }


                \Notification::sucess('Form has been saved, user has been discharge.');
                return redirect('/admin/forms');
                break;
            case 'vpf_cr':
                $form = FileCorrection::find($id);
                if($request->reviewed == 1)
                {
                    $form->reviewed = $request->reviewed;
                    $form->save();
                    \Notification::sucess('Form has been saved');
                    return redirect('/admin/forms');
                } else {
                    \Notification::warning('No action has been taken as review field was set to not reviewed');
                    return redirect('/admin/forms');
                }
                break;
            case 'ir':
                $form = InfractionReport::find($id);
                if($request->reviewed == 1)
                {
                $form->reviewed = $request->reviewed;
                $form->save();
                \Notification::sucess('Form has been saved');
                return redirect('/admin/forms');
                } else {
                    \Notification::warning('No action has been taken as review field was set to not reviewed');
                    return redirect('/admin/forms');
                }
                break;
            case 'assignment_change':
                $form = AssignmentChange::find($id);
                if($request->reviewed == 1)
                {
                    $form->reviewed = $request->reviewed;
                    $form->approved = $request->approved;
                    $form->approved_by = $user->vpf;
                    $form->save();

                    $ac = Assignment::find($request->requested_assignment);
                    $requestedAssignment = $ac->name.' - '.$ac->mos->mos.' - '.$ac->group->name;

                    if($request->approved == 1)
                    {
                        $decision = "Approved";

                        //Add Service History
                        $vpf->serviceHistory()->create([
                            'note' => 'Assignment Transfer to '.$ac->name.' - '.$ac->mos->mos.' - '.$ac->group->name,
                            'date'=> Carbon::now()
                        ]);

                        //Make Assignment Change
                        $vpf->assignment_id = $request->requested_assignment;
                        $vpf->save();
                    } else {
                        $decision = "Declined";
                    }

                    // Email User
                    $data = [
                        'approved'=>$decision,
                        'requested_assignment' => $requestedAssignment,
                    ];
                    $this->emailAssignmentChange($vpf->user,$data);

                    \Notification::success('Form has been saved');
                    return redirect('/admin/forms');
                } else {
                    \Notification::warning('No action has been taken as review field was set to not reviewed');
                    return redirect('/admin/forms');
                }

                break;
            case 'class-completion':
                $form = ClassCompletion::find($id);
                $form->status = 4;
                $form->save();
                \Notification::success('Form has been saved');
                return redirect('/admin/forms');
                break;
            default:
                abort(404);
                break;
        }
    }

    public function getSchoolComplete($vpf_id,$type,$id)
    {
        $form = ClassCompletion::find($id);

        $attendees = collect();
        $observers = collect();
        $helpers = collect();
        $enrolled = $form->date->school->VPF;

        if(!empty($form->attendees))
        {
            $attendees = User::find(explode(',',$form->attendees));
        }

        if(!empty($form->observers))
        {
            $observers = User::find(explode(',',$form->observers));
        }

        if(!empty($form->helpers))
        {
            $helpers = User::find(explode(',',$form->helpers));
        }

        return view('backend.forms.edit.class-completion-success')
            ->with('form',$form)
            ->with('attendees', $attendees)
            ->with('observers', $observers)
            ->with('enrolled', $enrolled)
            ->with('helpers', $helpers);
    }

    public function postSchoolComplete($vpf_id,$type,$id, Request $request)
    {
        $form = ClassCompletion::find($id);
        $graduates = User::find(explode(',',$request->graduates));
        $school = School::find($request->school_id);

        foreach($graduates as $graduate)
        {

            $graduate->vpf->schools()->detach($request->school_id);
            $graduate->vpf->schools()->attach($request->school_id, ['completed' => true, 'date_attended' => Carbon::now()]);
            $graduate->vpf->serviceHistory()->create([
                'note' => "Graduated from ".$school->name,
                'date' => Carbon::now(),
            ]);


        }

        $form->status = 5;
        $form->save();

        \Notification::success('Class has been marked as complete.');
        return redirect('/admin/forms');

    }

    /**
     * Compiles a list of all available assignments based on available and those marked as initial assignments
     * @return \Illuminate\Support\Collection
     */
    private function AssignmentListTransfer()
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
            if (is_null($assignmentCheck)) {
                // Transfer Open Check
                if($assignment->transfer_open == 1)
                    $availableForEnlistment->push($assignment);
            }
        }


        //Return list of unique MOS's, lets return a collection of MOS models for the page
        return $availableForEnlistment;
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

    /**
     * Sends email to User regarding Discharges
     * @param $user
     * @param $data
     */
    private function emailAssignmentChange($user,$data)
    {
        Mail::send('emails.assignmentChange', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
            $m->to($user->email, $user->vpf);
            $m->subject('1st RRF - Assignment Change');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
