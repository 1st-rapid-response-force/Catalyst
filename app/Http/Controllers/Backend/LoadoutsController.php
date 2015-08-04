<?php

namespace App\Http\Controllers\Backend;

use App\Loadout;
use App\Qualification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class LoadoutsController extends Controller
{
    /**
     * @var ImageRepositoryContract
     */
    protected $image;

    /**
     * Construct Controller
     * @param ImageRepositoryContract $image
     */
    public function __construct(ImageRepositoryContract $image)
    {
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $loadouts = Loadout::all();
        $qualifications = Qualification::all();
        return view('backend.loadouts.index')
            ->with('loadouts',$loadouts)
            ->with('qualifications',$qualifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return redirect('/admin/loadouts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'category'=>'required',
            'class_name' => 'required|string',
            'qualification_id'=>'required',
            'img' => 'required|image',

        ]);

        // Create and Process Model
        $loadout = new Loadout;
        $loadout->name = $request->name;
        $loadout->category = $request->category;
        $loadout->class_name = $request->class_name;
        $loadout->qualification_id = $request->qualification_id;
        $loadout->save();

        if(!$this->image->store($loadout,$request->file('img')))
        {
            \Notification::error('Unable to upload image, reverting changes');
            Loadout::destroy($loadout->id);
        }

        \Notification::success('Loadout was added successfully');
        return redirect('/admin/loadouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('/admin/loadouts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $loadout = Loadout::find($id);
        $qualifications = Qualification::all();
        return view('backend.loadouts.edit')
            ->with('loadout',$loadout)
            ->with('qualifications',$qualifications);
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
        $loadout = Loadout::find($id);
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'category'=>'required',
            'class_name' => 'required|string',
            'qualification_id'=>'required',
            'img' => 'image',

        ]);


        //If the update has a file deal with files first
        if($request->hasFile('img')) $this->image->update($loadout,$request->file('img'));

        // Update Model
        $loadout->name = $request->name;
        $loadout->category = $request->category;
        $loadout->class_name = $request->class_name;
        $loadout->qualification_id = $request->qualification_id;
        $loadout->save();

        \Notification::success('Loadout updated successfully.');
        return redirect('/admin/loadouts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $loadout = Loadout::find($id);

        $this->image->delete($loadout);
        $loadout->delete();

        \Notification::success('Loadout deleted successfully.');
        return redirect('/admin/loadouts');
    }
}
