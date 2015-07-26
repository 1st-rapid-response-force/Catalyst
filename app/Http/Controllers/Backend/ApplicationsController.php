<?php

namespace App\Http\Controllers\Backend;

use App\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apps = Application::where('status','=','Under Review')->Paginate(30);
        return view('backend.applications.index')->with('apps',$apps);
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

    public function approve(Request $request, $id)
    {
        //
    }

    public function reject(Request $request, $id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function accepted()
    {
        $apps = Application::where('status','=','Accepted')->Paginate(30);
        return view('backend.applications.index-accepted')->with('apps',$apps);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function rejected()
    {
        $apps = Application::where('status','=','Rejected')->Paginate(30);
        return view('backend.applications.index')->with('apps',$apps);
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
