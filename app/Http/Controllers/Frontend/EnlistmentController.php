<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Application;
use App\Assignment;
use App\VPF;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class EnlistmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //dd($availableForEnlistment);

        $user = \Auth::user();
        return view('frontend.enlistment.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($mos)
    {
        //Check if user already has an application
        $user = \Auth::user();
        if(!is_null($user->application_id))
        {
            \Notification::warning('You have already submitted an application');
            return redirect('/enlistment/my-application');
        }

        //Need to implement Assignment Logic
        $assignmentCheck = VPF::where('assignment_id',$mos)->first();


        if (is_null($assignmentCheck))
        {
            $user = \Auth::user();
            $mos = Assignment::find($mos);
            return view('frontend.enlistment.create')
                ->with('user',$user)
                ->with('mos',$mos);
        } else {
            \Notification::error('Assignment is unavailable, please select another assignment');
            return redirect('/enlistment/');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'steam_id' => '',
            'dob' => 'required|date',
            'nationality' => 'required',
            'email' => 'required|email',
            'assignment_id' => 'required',
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
        ]);

        $user = User::find($request->user_id);

        $time= new \Datetime($request->dob);

        $app = new Application;
        $app->user_id = $request->user_id;
        $app->first_name = ucfirst(strtolower($request->first_name));
        $app->last_name = ucfirst(strtolower($request->last_name));
        $app->dob = $time->format('Y-m-d H:i:s');
        $app->nationality = $request->nationality;
        $app->assignment_id = $request->assignment_id;
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
        $app->save();

        $user->application_id = $app->id;
        $user->save();


        \Notification::success('Application has been filed. It is in the process of being reviewed. You can check the status of your application via this page. You will also receive email updates. The current status of the application can be found in section D.');
        return redirect('/enlistment/my-application');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $user = \Auth::user();
        if(is_null($user->application_id))
        {
            \Notification::warning('You have not filed an enlistment application.');
            return redirect('/enlistment');
        }

        $app = Application::find($user->application->id);
        if ($user->id == $app->user->id)
        {
            return view('frontend.enlistment.show')->with('app',$app);
        } else {
            return abort('403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showApp($id)
    {
        $app = Application::findOrFail($id);
        $user = \Auth::user();

        // User must either have officer permission or be the owner of the application
        if (($user->can(['officer-permission'])))
        {
            \Notification::infoInstant('Officer - Application View - You are viewing an applicants enlistment paperwork.');
            return view('frontend.enlistment.show')->with('app',$app);
        } else {
            \Log::info('User attempted to access officer tier information - applications.', ['id'=> $user->id]);
            \Notification::error('You do not have permission to view this page');
            return redirect('/');
        }
    }


    /**
     * Compiles a list of all available assignments based on available and those marked as initial assignments
     * @return \Illuminate\Support\Collection
     */
    private function compileAssignmentList()
    {
        $assignments = Assignment::all();
        $availableForEnlistment = collect();

        foreach($assignments as $assignment)
        {
            //Check if anyone else has this ID
            $assignmentCheck = VPF::where('assignment_id',$assignment->id)->first();
            //If No One has it, add the model to a collection
            if (is_null($assignmentCheck)) {
                $availableForEnlistment->push($assignment);
            }
        }

        return $availableForEnlistment;
    }
}
