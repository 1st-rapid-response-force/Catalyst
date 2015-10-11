<?php

namespace App\Http\Controllers\Backend;

use App\OnCall;
use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OncallController extends Controller
{
    /**
     * Display a listing of the of all On Call Requests/Members.
     *
     * @return Response
     */
    public function index()
    {
        $oncalls = OnCall::all();

        return view('backend.oncall.index')
            ->with('oncalls', $oncalls);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexMembers()
    {
        $oncalls = VPF::where('oncall_status','=','1')->get();
        return view('backend.oncall.indexMembers')
            ->with('oncalls', $oncalls);
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
}
