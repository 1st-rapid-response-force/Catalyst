<?php

namespace App\Http\Controllers\Backend;

use App\Operation;
use App\Perstat;
use App\User;
use App\VPF;
use App\Application;
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
            ->with('cost',$cost);
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
