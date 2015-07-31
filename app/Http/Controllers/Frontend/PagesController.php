<?php

namespace App\Http\Controllers\Frontend;

use App\Group;
use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index()
    {
        $video = ['/frontend/videos/intro1.mp4','/frontend/videos/intro3.mp4'];
        $key = array_rand($video,1);
        return view('frontend.home')->with('video',$video[$key]);
    }

    /**
     * Display the about us page.
     *
     * @return Response
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * Display the servers.
     *
     * @return Response
     */
    public function servers()
    {
        return view('frontend.servers');
    }

    /**
     * Display the structure and assignment page.
     *
     * @return Response
     */
    public function structureAndAssignments()
    {
        $enlistedRanks = Rank::whereIn('id', array(2,3,4,5,6,7,8,9,10,11,12,13))->get();
        $warrantRanks = Rank::whereIn('id', array(14,15,16,17,18))->get();
        $officerRanks = Rank::whereIn('id', array(19,20,21,22,23,24))->get();
        $groups1 = Group::whereBetween('id', [2,14])->get();
        $groups2 = Group::whereBetween('id', [15, 25])->get();
        $groups3 = Group::whereBetween('id', [26,43])->get();
        return view('frontend.structure-assignment')
            ->with('enlistedRanks',$enlistedRanks)
            ->with('warrantRanks',$warrantRanks)
            ->with('officerRanks',$officerRanks)
            ->with('group1', $groups1)
            ->with('group2', $groups2)
            ->with('group3', $groups3);

    }

    /**
     * Display the FAQ page.
     *
     * @return Response
     */
    public function faq()
    {
        return view('frontend.faq');
    }

    /**
     * Display the Contact page.
     *
     * @return Response
     */
    public function contact()
    {
        $rod = User::find(1);
        $striker = User::find(2);
        return view('frontend.contact')
            ->with('rod',$rod)
            ->with('striker',$striker);
    }

}
