<?php

namespace App\Http\Controllers\Backend;

use App\Perstat;
use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerstatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $perstats = Perstat::all();

        return view('backend.perstat.index')
            ->with('perstats', $perstats);
    }

    public function test()
    {
        $assigned = VPF::where('status','=','Active')->get()->count();
        $perstat = new Perstat;
        $perstat->from = '2015-09-03';
        $perstat->to = '2015-09-06';
        $perstat->assigned = $assigned;
        $perstat->active = true;
        $perstat->save();

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
        $perstat = Perstat::find($id);
        return view('backend.perstat.show')
            ->with('perstat',$perstat);
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
