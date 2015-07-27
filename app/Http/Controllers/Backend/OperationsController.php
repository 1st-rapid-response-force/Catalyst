<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Operation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class OperationsController extends Controller
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
        $operations = Operation::all();
        return view('backend.operations.index')
            ->with('operations',$operations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.operations.create');
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
            'img' => 'image',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required',
            'promotionPoints' => 'integer',
        ]);

        // Deal with time and date
        $time= new \Datetime($request->date.' '.$request->time);

        // Create and Process Model
        $operation = new Operation;
        $operation->name = $request->name;
        $operation->description = $request->description;
        $operation->date = $time->format('Y-m-d H:i:s');
        $operation->promotionPoints = $request->promotionPoints;
        $operation->save();

        // Call Save Image Method Controller to Upload Image if an image is uploaded
        if($request->hasFile('img'))
        {
            $this->image->store($operation,'operations',$request->file('img'));
        } else {
            // If user has decided to not upload an image, a placeholder (however will not be displayed)
            $operation->storage_image = 'false';
            $operation->public_image = '/img/placeholder.png';
            $operation->save();
        }
        return redirect('/admin/operations');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $operation = Operation::find($id);
        return view('backend.operations.show')
            ->with('operation',$operation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $operation = Operation::find($id);
        return view('backend.operations.edit')
            ->with('operation',$operation);
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
        $operation = Operation::find($id);
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'img' => 'image',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required',
            'promotionPoints' => 'integer',
        ]);

        // Deal with time and date
        $time= new \Datetime($request->date.' '.$request->time);

        // Deal with image remove first
        if(($request->removeImage == 'true'))
        {
            $this->image->delete($operation);
            $operation->storage_image = 'false';
            $operation->public_image = '/img/placeholder.png';
        }

        // If the update has a file deal with files first
        if($request->hasFile('img'))
        {
            //Deal with Image update
            $this->image->update($operation,'operations',$request->File('img'));
        }

        $operation->name = $request->name;
        $operation->description = $request->description;
        $operation->date = $time->format('Y-m-d H:i:s');
        $operation->promotionPoints = $request->promotionPoints;
        $operation->save();

        \Notification::success('Operation modified successfully');
        return redirect('/admin/operations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $operation = Operation::find($id);
        if(!($operation->storage_image == 'false'))
        {
            $this->image->delete($operation);
        }

        $operation->delete();

        \Notification::success('Operation deleted successfully.');
        return redirect('/admin/operations');
    }
}
