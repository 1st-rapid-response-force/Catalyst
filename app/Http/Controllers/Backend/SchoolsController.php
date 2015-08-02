<?php

namespace App\Http\Controllers\Backend;

use App\Rank;
use App\School;
use App\SchoolTrainingDate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class SchoolsController extends Controller
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
        $schools = School::all();
        return view('backend.schools.index')
            ->with('schools',$schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $ranks = Rank::all();
        return view('backend.schools.create')
            ->with('ranks',$ranks);
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
            'short_description' => 'required',
            'description' => 'required',
            'docs' => '',
            'videos' => '',
            'published' => '',
            'promotionPoints' => 'integer',
        ]);

        // Create and Process Model
        $school = new School;
        $school->name = $request->name;
        $school->short_description = $request->short_description;
        $school->description = $request->description;
        $school->prerequisites = $request->prerequisites;
        $school->minimumRankRequired = $request->minimumRankRequired;
        $school->docs = $request->docs;
        $school->videos = $request->video;
        $school->published = $request->published;
        $school->promotionPoints = $request->promotionPoints;
        $school->save();

        // Call Save Image Method Controller to Upload Image if an image is uploaded
        if($request->hasFile('img'))
        {
            if(!$this->image->store($school,$request->file('img'))) {
                \Notification::error('Unable to upload school image, reverting changes');
                School::destroy($school->id);
            }
        } else {
            // If user has decided to not upload an image, a placeholder (however will not be displayed)
            $school->storage_image = 'false';
            $school->public_image = 'placeholder.png';
            $school->save();
        }
        \Notification::success('School added successfully');
        return redirect('/admin/schools');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $school = School::find($id);
        return view('backend.schools.show')
            ->with('school',$school);
    }

    public function indexTimeDate($id)
    {
        $school = School::find($id);
        return view('backend.schools.indexTimeDate')
            ->with('school',$school);
    }

    public function addTimeDate(Request $request,$id)
    {
        $time= new \Datetime($request->date.' '.$request->time);
        $test = new SchoolTrainingDate;
        $test->school_id = $id;
        $test->date = $time->format('Y-m-d H:i:s');
        $test->save();
        \Notification::success('Time/Date to school added successfully');
        return redirect('/admin/schools/time-date/'.$id);
    }

    public function deleteTimeDate($school_id,$id)
    {
        $date = SchoolTrainingDate::find($id);
        $date->delete();
        \Notification::success('Time/Date has been removed added successfully');
        return redirect('/admin/schools/time-date/'.$school_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        $json = $this->prePopulatePrerequisites($school->prerequisites);
        $ranks = Rank::all();
        return view('backend.schools.edit')
            ->with('school',$school)
            ->with('ranks',$ranks)
            ->with('json',$json);
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
        $school = School::find($id);
        // Validate Form
        $this->validate($request, [
            'name' => 'required|string',
            'img' => 'image',
            'description' => 'required',
            'docs' => '',
            'videos' => '',
            'published' => '',
            'promotionPoints' => 'integer',
        ]);

        // Deal with image remove first
        if(($request->removeImage == 'true'))
        {
            $this->image->delete($school);
            $school->storage_image = 'false';
            $school->public_image = 'placeholder.png';
        }

        // If the update has a file deal with files first
        if($request->hasFile('img'))
        {
            //Deal with Image update
            $this->image->update($school,$request->File('img'));
        }

        $school->name = $request->name;
        $school->short_description = $request->short_description;
        $school->description = $request->description;
        $school->docs = $request->docs;
        $school->videos = $request->video;
        $school->prerequisites = $request->prerequisites;
        $school->minimumRankRequired = $request->minimumRankRequired;
        $school->published = $request->published;
        $school->promotionPoints = $request->promotionPoints;
        $school->save();

        \Notification::success('Schools modified successfully');
        return redirect('/admin/schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        if(!($school->storage_image == 'false'))
        {
            $this->image->delete($school);
        }

        $school->delete();

        \Notification::success('School deleted successfully.');
        return redirect('/admin/schools');
    }


    private function prePopulatePrerequisites($prerequisites)
    {
        $array = explode(',',$prerequisites);
        $schools= School::findMany($array);

        if($schools->isEmpty())
            return false;
        $results = collect();
        foreach($schools as $school)
        {
            $rt = ['id' => $school->id,
                'name' => $school->name,];
            $results->push($rt);
        }

        return $results->toJson();
    }
}
