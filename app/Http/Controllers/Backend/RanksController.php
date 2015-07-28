<?php

namespace App\Http\Controllers\Backend;

use App\Rank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

class RanksController extends Controller
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
        $ranks = Rank::all();
        return view('backend.ranks.index')
            ->with('ranks',$ranks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return redirect('admin/ranks');
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
            'abbreviation' => 'required|string',
            'name' => 'required|string',
            'pay_grade' => 'required|string',
            'img' => 'required|image',
            'promotionPointsRequired' => 'required|integer',
            'tigRequired' => 'required|integer',
            'weight' => 'required|integer',
            'next_rank' => 'required|integer',
            'teamspeakGroup' => 'required|integer',
        ]);

        //Create new Model
        $rank = new Rank;
        $rank->abbreviation = $request->abbreviation;
        $rank->name = $request->name;
        $rank->pay_grade = $request->pay_grade;
        $rank->promotionPointsRequired = $request->promotionPointsRequired;
        $rank->tigRequired = $request->tigRequired;
        $rank->weight = $request->weight;
        $rank->next_rank = $request->next_rank;
        $rank->teamspeakGroup = $request->teamspeakGroup;
        $rank->save();

        //Deal with image
        $this->image->store($rank,$request->file('img'));

        return redirect('/admin/ranks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('admin/ranks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rank = Rank::find($id);
        $ranks = Rank::all();
        return view('backend.ranks.edit')
            ->with('rank',$rank)
            ->with('ranks',$ranks);
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
        $rank = Rank::find($id);
        // Validate Form
        $this->validate($request, [
            'abbreviation' => 'required|string',
            'name' => 'required|string',
            'pay_grade' => 'required|string',
            'img' => 'image',
            'promotionPointsRequired' => 'required|integer',
            'tigRequired' => 'required|integer',
            'weight' => 'required|integer',
            'next_rank' => 'required|integer',
            'teamspeakGroup' => 'required|integer',
        ]);

        //If the update has a file deal with files first
        if($request->hasFile('img')) $this->image->update($rank,$request->file('img'));

        //Create new Model
        $rank->abbreviation = $request->abbreviation;
        $rank->name = $request->name;
        $rank->pay_grade = $request->pay_grade;
        $rank->promotionPointsRequired = $request->promotionPointsRequired;
        $rank->tigRequired = $request->tigRequired;
        $rank->weight = $request->weight;
        $rank->next_rank = $request->next_rank;
        $rank->teamspeakGroup = $request->teamspeakGroup;
        $rank->save();

        \Notification::success('Ranks updated successfully.');
        return redirect('/admin/ranks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $rank = Rank::find($id);

        $this->image->delete($rank);
        $rank->delete();

        \Notification::success('Ranks deleted successfully.');
        return redirect('/admin/ranks');
    }
}
