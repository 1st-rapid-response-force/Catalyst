<?php

namespace App\Http\Controllers\Frontend;

use App\Article15;
use App\DCS;
use App\Discharge;
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
            default:
                abort(404);
                break;
        }
    }
}
