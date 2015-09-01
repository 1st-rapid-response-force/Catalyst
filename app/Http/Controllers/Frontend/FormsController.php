<?php

namespace App\Http\Controllers\Frontend;

use App\Article15;
use App\Assignment;
use App\AssignmentChange;
use App\DCS;
use App\Discharge;
use App\FileCorrection;
use App\InfractionReport;
use App\NCS;
use App\VCS;
use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Krucas\Notification\Notification;

class FormsController extends Controller
{
    /**
     * @param $type
     * @return mixed
     */
    public function create($type)
    {
        $user = \Auth::User();
        $vpf = \Auth::User()->vpf;
        switch($type)
        {
            case 'ir':
                $vpfs = VPF::all();
                return view('frontend.forms.infraction_report_new')
                    ->with('vpfs',$vpfs)
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'discharge':
                return view('frontend.forms.dis_new')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'vpf_cr':
                return view('frontend.forms.file_correction_new')
                    ->with('vpf',$vpf)
                    ->with('user',$user);
                break;
            case 'assignment_change':
                $assignmentList = $this->AssignmentListTransfer();
                if($assignmentList->count() > 0)
                {
                    return view('frontend.forms.assignment_change_new')
                        ->with('vpf',$vpf)
                        ->with('assignmentList',$assignmentList)
                        ->with('user',$user);
                } else {
                    \Notification::error('There are no open assignments to apply for. Try again later');
                    return redirect('/virtual-personnel-file');
                }

                break;
            default:
                abort(404);
                break;
        }
    }

    /**
     * Store form for review
     * @param $type
     * @param Request $request
     */
    public function store($type, Request $request)
    {
        $user = \Auth::User();
        $vpf = \Auth::User()->vpf;
        switch($type)
        {
            case 'ir':
                $vpf->infraction_reports()->create([
                    'violator_name' => $request->violator_name,
                    'violation_summary' => $request->violation_summary,
                ]);
                \Notification::success('Report has been filed, and will be reviewed soon');
                return redirect('/virtual-personnel-file');
                break;
            case 'discharge':
                $vpf->discharges()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'discharge_text' => $request->discharge_text,
                    'organization' => $request->organization,
                    'discharge_type' => 'PENDING REVIEW',
                    'discharger_name' => '',
                    'discharger_grade' => '',
                    'discharger_organization' => '',
                    'discharger_signature' => ''
                ]);
                \Notification::success('Your request for discharge has been filed. You will be notified by email once it has been processed. Thank you for fighting with us.');
                return redirect('/virtual-personnel-file');
                break;
            case 'vpf_cr':
            {
                $vpf->file_corrections()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'organization' => $request->organization,
                    'correction_summary' => $request->correction_summary,
                    'reviewed'=>false
                ]);
                \Notification::success('Your request for file correction has been filed.');
                return redirect('/virtual-personnel-file');
            }
            case 'assignment_change':
            {
                $vpf->assignment_changes()->create([
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'date' => $request->date,
                    'organization' => $request->organization,
                    'request_reason' => $request->request_reason,
                    'requested_assignment' => $request->requested_assignment,
                    'reviewed'=>false
                ]);
                \Notification::success('Your request for assignment change has been filed.');
                return redirect('/virtual-personnel-file');
            }
            default:
                abort(404);
                break;
        }
    }

    /**
     * Used to display the form type
     *
     * @param $type
     * @param $id
     * @return array|\Illuminate\View\View|mixed
     */
    public function show($type,$id)
    {
        $user = \Auth::User();
        $vpf = \Auth::User()->vpf;
        switch($type)
        {
            case 'article15':
                $art = Article15::find($id);
                if(($art->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.article15')
                        ->with('art',$art)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$art->vpf_id);
                }
                break;
            case 'ncs':
                $ncs = NCS::find($id);
                if(($ncs->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.ncs')
                        ->with('ncs',$ncs)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$ncs->vpf_id);
                }
                break;
            case 'vcs':
                $vcs = VCS::find($id);
                if(($vcs->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.vcs')
                        ->with('vcs',$vcs)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$vcs->vpf_id);
                }
                break;
            case 'ir':
                $ir = InfractionReport::find($id);
                if(($ir->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.infraction_report')
                        ->with('ir',$ir)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$ir->vpf_id);
                }
                break;
            case 'dcs':
                $dcs = DCS::find($id);
                if(($dcs->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.dcs')
                        ->with('dcs',$dcs)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$dcs->vpf_id);
                }
                break;
            case 'vpf_cr':
                $vpf_cr = FileCorrection::find($id);
                if(($vpf_cr->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.file_correction')
                        ->with('vpf_cr',$vpf_cr)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$dcs->vpf_id);
                }
                break;
            case 'training-completion':
                break;
            case 'discharge':
                $dis = Discharge::find($id);
                if(($dis->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.dis')
                        ->with('dis',$dis)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$dis->vpf_id);
                }
                break;
            case 'assignment_change':
                $ac = AssignmentChange::find($id);
                if(($ac->vpf_id == $user->vpf->id) || ($user->hasRole(['nco','officer','superadmin'])))
                {
                    return view('frontend.forms.assignment_change')
                        ->with('ac',$ac)
                        ->with('vpf',$vpf)
                        ->with('user',$user);
                } else {
                    \Notification::error('You do not have permission to view this form.');
                    return redirect('/roster/'.$ac->vpf_id);
                }
                break;
            default:
                abort(404);
                break;
        }
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

}
