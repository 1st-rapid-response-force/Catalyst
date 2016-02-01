<?php

namespace App\Http\Controllers\Backend;

use App\InfilAnnouncements;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Krucas\Notification\Notification;

class InfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infilReports = InfilAnnouncements::all();
        return view('backend.infil.index')
            ->with('infils',$infilReports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.infil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->vpf->infils()->create($request->all());
        \Notification::success('Infil Message created successfully.');
        return redirect('/admin/infil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infilReports = InfilAnnouncements::find($id);
        return view('backend.infil.edit')
            ->with('infil',$infilReports);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $infil = InfilAnnouncements::find($id);
        $infil->update($request->all());
        \Notification::success('Infil Message updated successfully.');
        return redirect(route('admin.infil.edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infil = InfilAnnouncements::find($id);
        $infil->delete();
        \Notification::success('Infil Message deleted successfully.');
        return redirect('/admin/infil');
    }
}
