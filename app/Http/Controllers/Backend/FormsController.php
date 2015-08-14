<?php

namespace App\Http\Controllers\Backend;

use App\Article15;
use App\DCS;
use App\Discharge;
use App\NCS;
use App\VCS;
use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{
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
            case 'training-completion':
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
            case 'training-completion':
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
            case 'training-completion':
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
}
