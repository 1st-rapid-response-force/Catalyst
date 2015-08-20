<?php

namespace App\Http\Controllers\Frontend;

use Mail;
use App\MOS;
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

        $mos = $this->AssignmentList();
        $user = \Auth::user();
        return view('frontend.enlistment.index')
            ->with('user',$user)
            ->with('availMOSs',$mos);
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
        $mos = MOS::find($mos);
        $availableMOS = $this->AssignmentList();

        // User has no application
        if(!is_null($user->application_id))
        {
            \Notification::warning('You have already submitted an application');
            return redirect('/enlistment/my-application');
        }

        // User is apply for a locked MOS
        if(!$availableMOS->contains($mos))
        {
            \Notification::error('This MOS is not available. Select one from the available list.');
            return redirect('/enlistment/');
        }

        $user = \Auth::user();
        $this->emailApplicationFiled($user);
        return view('frontend.enlistment.create')
            ->with('user',$user)
            ->with('mos',$mos);
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
            'mos_id' => 'required',
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

        // Final Check to ensure that user didn't modify the values OR the MOS was filled during his application
        $mos = MOS::find($request->mos_id);
        $availableMOS = $this->AssignmentList();

        // User is apply for a locked MOS
        if(!$availableMOS->contains($mos))
        {
            \Notification::error('This MOS is not available. Select one from the available list.');
            return redirect('/enlistment/');
        }

        //Find the user
        $user = User::find($request->user_id);

        //Convert the time for database storage
        $time= new \Datetime($request->dob);

        //Create the Application
        $app = new Application;
        $app->user_id = $request->user_id;
        $app->first_name = ucfirst(strtolower($request->first_name));
        $app->last_name = ucfirst(strtolower($request->last_name));
        $app->dob = $time->format('Y-m-d H:i:s');
        $app->nationality = $request->nationality;
        $app->mos_id = $request->mos_id;
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

        //Update User Model by providing the Application ID
        $user->application_id = $app->id;
        $user->save();


        //Redirect to Application
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

        //Error Handling - No Application
        if(is_null($user->application_id))
        {
            \Notification::warning('You have not filed an enlistment application.');
            return redirect('/enlistment');
        }

        // Pull App and display and ensure that user is view his own application
        $app = Application::find($user->application->id);
        if ($user->id == $app->user->id)
        {
            return view('frontend.enlistment.show')->with('app',$app);
        } else {
            return abort('403');
        }
    }

    /**
     * Compiles a list of all available MOSs based on available and those marked as initial assignments
     * @return \Illuminate\Support\Collection
     */
    private function AssignmentList()
    {
        //Variable Declaration
        $assignments = Assignment::all();
        $availableForEnlistment = collect();
        $mos = collect();

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
        $unique = $availableForEnlistment->unique('mos_id');

        //Assemble MOS that are available
        foreach($unique as $assign)
        {
            $mosModel = MOS::find($assign->mos_id);
            $mos->push($mosModel);
        }

        //Returns a collection of MOS's that are currently available
        return $mos;
    }

    /**
     * Email's User
     * @param $user
     */
    private function emailApplicationFiled($user)
    {

        Mail::send('emails.applicationFiled', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, 'User');
            $m->subject('1st RRF - You have completed your Enlistment Paperwork');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
