<?php

namespace App\Http\Controllers\Frontend;

use App\Perstat;
use App\SquadAnnouncements;
use App\SquadChatter;
use App\UnitAnnouncements;
use App\VPF;
use Illuminate\Http\Request;
use App\Modules\Teamspeak\TeamspeakContract;
use App\Repositories\Image\ImageRepositoryContract;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class mySquadController extends Controller
{
    /**
     * @var ImageRepositoryContract
     */
    protected $image;

    /**
     * @var TeamspeakContract
     */
    protected $ts;

    /**
     * @param ImageRepositoryContract $image
     * @param TeamspeakContract $ts
     */
    public function __construct(ImageRepositoryContract $image, TeamspeakContract $ts){
        $this->image = $image;
        $this->ts = $ts;
    }
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
        $perstat = Perstat::where('active','=','1')->first();
        $oncall = $this->getOnCallCats();

        return view('frontend.my-squad.index')
            ->with('user',$user)
            ->with('unitAnnouncements', $unitAnnouncements)
            ->with('chatter',$chatter)
            ->with('perstat',$perstat)
            ->with('oncallCat',$oncall);
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

        \Log::info('SQUAD: User posted a message in squad chatter', ['user'=> [$user->id,$user->email,$user->vpf->assignment->name,$user->vpf->assignment->group_id]]);
        \Notification::success('Message added successfully');
        return redirect('/my-squad');

    }

    /**
     * Enables OnCall
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function onCallAdd(Request $request)
    {
        $user = \Auth()->user();
        $this->ts->message($user,"[COLOR=red]You have enabled the ON-CALL SYSTEM - TYPE: ".$request->oncall_type." [/COLOR]");
        $phone = $request->oncall_phone;

        $user->vpf->oncall_status = true;
        $user->vpf->oncall_phone = $request->oncall_phone;
        $user->vpf->oncall_type = $request->oncall_type;
        $user->push();

        if($user->vpf->onCallPhoneEnabled())
        {
            try{
                \Twilio::message($request->oncall_phone,'1ST RRF - You have enabled the ON-CALL system - TYPE: '.$request->oncall_type);
                \Notification::success('You have been set On Call.');
            } catch (\Services_Twilio_RestException $e)
            {
                $user->vpf->oncall_phone = '';
                \Notification::warning('You have been set On Call, however the your phone was not valid. You will receive messages via TS');

            }

        }



        return redirect('/my-squad');

    }
    public function onCallAssistance(Request $request)
    {
        $this->validate($request, [
            'oncall_type' => 'required',
            'grid' => 'required',
            'callsign' => 'required',
            'urgency' => 'required',
            'enemy_sit' => 'required'
        ]);

        $user = \Auth()->user();

        try {
            $oncallCheck = $user->vpf->onCallRequests->reverse()->first();
            $oncallCheck = $oncallCheck->created_at;
        } catch (\ErrorException $e) {
            $oncallCheck = Carbon::now()->subMinute(10);
        }

        $now = Carbon::now();

        if($oncallCheck->addMinutes(5) < $now)
        {
            $oncall = $user->vpf->onCallRequests()->create([
                'oncall_type' => $request->oncall_type,
                'grid' => $request->grid,
                'callsign' => $request->callsign,
                'urgency' => $request->urgency,
                'security' => $request->enemy_sit,
                'other' => $request->other,
            ]);


            foreach ($oncall->oncallMembers() as $vpf) {
                $this->ts->message($vpf->user,"[COLOR=red]ON-CALL SYSTEM ALERT - TYPE: ".$request->oncall_type
                    ." | GRID: ".$request->grid
                    ." | CALLSIGN: ".$request->callsign
                    ." | ".$request->urgency
                    ." | ".$request->enemy_sit
                    ." | OTHER: ".$request->other
                    ." [/COLOR]");
                $phone = $vpf->oncall_phone;
                if($user->vpf->onCallPhoneEnabled()) {
                    try {
                        \Twilio::message($vpf->oncall_phone, '1ST RRF - ON CALL ALERT - ' .
                            $request->oncall_type . ' | ' .
                            $request->grid . ' | ' .
                            $request->callsign . ' | ' .
                            $request->urgency . ' | ' .
                            $request->enemy_sit. ' | '.
                            $request->other );
                    } catch (\Services_Twilio_RestException $e) {}
                }
            }

            \Notification::success('On Call Request has been dispatched to all applicable members, Do not resend your request if no one contacts you.');
        } else {
            \Notification::warning('You have already submitted an on call request, due to flood protection, you need to wait 5 minutes between requests.');
        }

        return redirect('/my-squad');
    }

    /**
     * Disables OnCall
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function onCallDisable(Request $request)
    {
        $user = \Auth()->user();
        $phone = $user->vpf->oncall_phone;
        if($user->vpf->onCallPhoneEnabled()) {
            try {
                \Twilio::message($user->vpf->oncall_phone,'1ST RRF - You have disabled the ON-CALL system.');
            } catch (\Services_Twilio_RestException $e) {}
        }

        $save =$this->ts->message($user,"[COLOR=red]You have disabled the ON-CALL SYSTEM[/COLOR]");

        $user->vpf->oncall_status = false;
        $user->vpf->oncall_phone = "";
        $user->vpf->oncall_type = "";
        $user->push();

        \Notification::success('You have been been removed from On Call.');
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

    public function viewAnnouncement($id)
    {
        $user = \Auth()->user();
        $announce = UnitAnnouncements::find($id);
        return view('frontend.my-squad.announceView')
            ->with('user',$user)
            ->with('announce',$announce);
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

    public function reportIn()
    {
        $user = \Auth()->user();
        $perstat = Perstat::where('active','=','1')->first();
        $user->vpf->perstat()->attach($perstat->id);
        \Log::info('SQUAD: User has reported in', ['user'=> [$user->id,$user->email,$user->vpf->assignment->name,$user->vpf->assignment->group_id]]);
        \Notification::success('Your report in has been filed. Make sure to report in weekly.');
        return redirect('/my-squad');
    }

    private function getOnCallCats()
    {
        $vpfs = VPF::all();
        $cat = collect();
        foreach($vpfs as $vpf)
        {
            switch($vpf->oncall_type)
            {
                case 'MEDEVAC':
                    $type = collect(['type'=>'MEDEVAC','name'=>'MEDEVAC']);
                    $cat->push($type);
                    break;
                case 'LOGISTICS':
                    $type = collect(['type'=>'LOGISTICS','name'=>'Logistics']);
                    $cat->push($type);
                    break;
                case 'TRANSPORT':
                    $type = collect(['type'=>'TRANSPORT','name'=>'Transport']);
                    $cat->push($type);
                    break;
                case 'CAS':
                    $type = collect(['type'=>'CAS','name'=>'Close Air Support']);
                    $cat->push($type);
                    break;
                case 'COMMAND':
                    $type = collect(['type'=>'COMMAND','name'=>'Command']);
                    $cat->push($type);
                    break;
                case 'ATC':
                    $type = collect(['type'=>'ATC','name'=>'Air Traffic Control']);
                    $cat->push($type);
                    break;
                default:
                    break;
            }
        }

        return $cat->unique();
    }

}
