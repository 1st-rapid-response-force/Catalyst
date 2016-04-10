<?php

namespace App\Http\Controllers\Backend;

use App\Event;
use App\Operation;
use App\Assignment;
use App\AssignmentChange;
use App\ClassCompletion;
use App\School;
use App\Article15;
use App\DCS;
use App\Discharge;
use App\FileCorrection;
use App\InfractionReport;
use App\NCS;
use App\VCS;
use App\Perstat;
use App\User;
use App\VPF;
use App\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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

        // Calendar
        $events = Event::admin()->get();

        $birthdays = collect();
        // Fun Stuff
        foreach(VPF::active()->get() as $vpf)
        {
            $dob = $vpf->user->application->dob->year(Carbon::now()->year);
            $birthdays->push(\Calendar::event(
                $vpf.' -  Birthday', //event title
                true, //full day event?
                $dob,
                $dob,
                rand(9000,10000),
                [
                    'color' => '#4B870C'
                ]
            ));
        }
        $calendar = \Calendar::addEvents($events);
        $calendar = \Calendar::addEvents($birthdays);


        $members = VPF::where('status','=','Active')->get()->count();
        $application = Application::where('status','=','Under Review')->get()->count();
        $operations = Operation::all()->count();
        $perstat = Perstat::where('active','=','1')->first();
        $cost = $this->determineDonationAmount();


        return view('backend.dashboard')
            ->with('members',$members)
            ->with('applications',$application)
            ->with('operations',$operations)
            ->with('perstat',$perstat)
            ->with('forms',$forms)
            ->with('cost',$cost)
            ->with('calendar',$calendar);
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
        //
    }

    private function determineDonationAmount()
    {
        $users = User::all();
        $cost = 0.00;
        foreach($users as $user)
        {
            if($user->stripe_active == 1)
            {
                switch ($user->stripe_plan) {
                    case '5month':
                        $cost += 5.00;
                        break;
                    case '15month':
                        $cost += 15.00;
                        break;
                    case '25month':
                        $cost += 25.00;
                        break;
                    case '50month':
                        $cost += 50.00;
                        break;
                    default:
                        $cost += 0;
                        break;
                }
            }
        }

        return $cost;
    }
}
