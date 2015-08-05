<?php

namespace App\Http\Controllers\Backend;

use App\Operation;
use App\Qualification;
use App\Rank;
use App\Ribbon;
use App\School;
use App\User;
use App\VPF;
use App\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VPFController extends Controller
{
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
        $assignments = $this->AssignmentList();

        $forms = collect();
        $forms = $forms->merge($vpf->article15);
        $forms = $forms->merge($vpf->vcs);
        $forms = $forms->merge($vpf->ncs);
        $forms = $forms->merge($vpf->dcs);
        $forms = $forms->sortByDesc('created_at');

        $buildProfile = collect(
            ['serviceHistory'=>$vpf->serviceHistory->sortByDesc('date'),
                'ribbons'=>$vpf->ribbons,
                'qualifications'=>$user->vpf->qualifications,
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
        $user = User::find($id);
        switch ($request->form_type) {
            case 'addServiceHistory':
                $this->addServiceHistory($user,$request->serviceHistoryNote,$request->serviceHistoryDate);
                \Notification::success('Service History added successfully');
                break;
            case 'addRibbon':
                $this->addRibbon($user,$request->ribbons,$request->dateAwarded);
                \Notification::success('Ribbon added successfully');
                break;
            case 'addQualifications':
                $this->addQualification($user,$request->qualifications,$request->dateAwarded);
                \Notification::success('Qualification added successfully');
                break;
            case 'addOperations':
                $this->addOperation($user,$request->operations);
                \Notification::success('Operation added successfully');
                break;
            case 'addSchools':
                $this->addSchools($user,$request->schools,$request->completed,$request->dateAttended);
                \Notification::success('School added successfully');
                break;
            case 'profile':
                $this->saveProfile($user,$request);
                \Notification::success('Saving Profile');
                break;
        }

        return redirect('/admin/vpf/'.$user->vpf->id);
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
            if (is_null($assignmentCheck)) {
                $availableForEnlistment->push($assignment);
            }
        }
        //Return list of unique MOS's, lets return a collection of MOS models for the page
        return $availableForEnlistment;
    }


    private function addServiceHistory($user,$service_history, $date = '2015-09-01')
    {
        $user->vpf->serviceHistory()->create([
            'note' => $service_history,
            'date' => $date
        ]);
    }

    private function addRibbon($user,$ribbon,$date = '2015-09-01')
    {
        $user->vpf->ribbons()->attach([
            $ribbon =>['date_awarded' => $date]
        ]);
    }

    private function addOperation($user,$operation)
    {
        $user->vpf->operations()->attach($operation);
    }

    private function addQualification($user,$qualification,$date = '2015-09-01')
    {
        $user->vpf->qualifications()->attach([
            $qualification => ['date_awarded' => $date]
        ]);
    }

    private function addSchools($user,$school,$completed ,$date = '2015-09-01')
    {
        $user->vpf->schools()->attach([
            $school => ['date_attended' => $date, 'completed' => $completed]
        ]);
    }

    private function saveProfile($user,$input)
    {
        $user->vpf->first_name = $input->first_name;
        $user->vpf->last_name = $input->last_name;
        $user->application->dob = $input->dob;
        $user->vpf->user_id = $input->user_id;
        $user->vpf->face_id = $input->face_id;
        $user->vpf->rank_id = $input->rank_id;
        //Call Teamspeak function
        $user->vpf->status = $input->status;
        $user->vpf->assignment_id = $input->assignment_id;
        $user->push();
    }

}
