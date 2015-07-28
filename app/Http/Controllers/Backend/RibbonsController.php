<?php

namespace App\Http\Controllers\Backend;

use App\Ribbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class RibbonsController extends Controller
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
        $ribbons = Ribbon::all();
        return view('backend.ribbons.index')
            ->with('ribbons',$ribbons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return redirect('/backend/ribbons');
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
        $ribbon = new Ribbon;
        $ribbon->name = $request->name;
        $ribbon->description = $request->description;
        $ribbon->promotionPoints = $request->promotionPoints;
        $ribbon->save();

        if(!$this->image->store($ribbon,$request->file('img')))
        {
            \Notification::error('Unable to upload image, reverting changes');
            Ribbon::destroy($ribbon->id);
        }

        \Notification::success('Ribbon added successfully');
        return redirect('/admin/ribbons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('/backend/ribbons');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $ribbon = Ribbon::find($id);
        return view('backend.ribbons.edit')
            ->with('ribbon',$ribbon);
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
        $ribbon = Ribbon::find($id);
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'img' => 'image',
            'description' => 'required|string',
            'promotionPoints' => 'integer'
        ]);


        //If the update has a file deal with files first
        if($request->hasFile('img')) $this->image->update($ribbon,$request->file('img'));

        // Update Model
        $ribbon->name = $request->name;
        $ribbon->description = $request->description;
        $ribbon->promotionPoints = $request->promotionPoints;
        $ribbon->save();

        \Notification::success('Ribbon updated successfully.');
        return redirect('/admin/ribbons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $ribbon = Ribbon::find($id);

        $this->image->delete($ribbon);
        $ribbon->delete();

        \Notification::success('Ribbon deleted successfully.');
        return redirect('/admin/ribbons');
    }
}
