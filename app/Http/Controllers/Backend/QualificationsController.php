<?php

namespace App\Http\Controllers\Backend;

use App\Qualification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class QualificationsController extends Controller
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
        $qualifications = Qualification::all();
        return view('backend.qualifications.index')
            ->with('qualifications',$qualifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return redirect('/backend/qualifications');
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
            'img' => 'required|image',
            'description' => 'required|string',
            'promotionPoints' => 'integer'
        ]);

        // Create and Process Model
        $qualification = new Qualification();
        $qualification->name = $request->name;
        $qualification->description = $request->description;
        $qualification->promotionPoints = $request->promotionPoints;
        $qualification->save();

        if(!$this->image->store($qualification,'qualifications',$request->file('img'))) {
            \Notification::error('Unable to upload image, reverting changes');
            Qualification::destroy($qualification->id);
        }

        \Notification::success('Qualification added successfully');
        return redirect('/admin/qualifications');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('/backend/qualifications');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $qualification = Qualification::find($id);
        return view('backend.qualifications.edit')
            ->with('qualification',$qualification);
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
        $qualification = Qualification::find($id);
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'img' => 'image',
            'description' => 'required|string',
            'promotionPoints' => 'integer'
        ]);

        //If the update has a file deal with files first
        if($request->hasFile('img')) $this->image->update($qualification,'qualifications',$request->file('img'));

        // Update Model
        $qualification->name = $request->name;
        $qualification->description = $request->description;
        $qualification->promotionPoints = $request->promotionPoints;
        $qualification->save();

        \Notification::success('Qualification updated successfully.');
        return redirect('/admin/qualifications');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $qualification = Qualification::find($id);

        $this->image->delete($qualification);
        $qualification->delete();

        \Notification::success('Qualification deleted successfully.');
        return redirect('/admin/qualifications');
    }
}
