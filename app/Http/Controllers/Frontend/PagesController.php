<?php

namespace App\Http\Controllers\Frontend;

use App\Group;
use App\InfilAnnouncements;
use App\Rank;
use App\User;
use App\VPF;
use Carbon\Carbon;
use Response;
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
        $command = Group::whereBetween('id', [2,5])->get();
        $alpha = Group::whereBetween('id', [8,10])->get();
        $alphaViking = Group::whereBetween('id', [11,14])->get();
        $alphaWolf = Group::whereBetween('id', [15,18])->get();
        $bravo = Group::whereIn('id', [19,20,21,22,23,24,25])->get();
        $bravo2nd = Group::whereBetween('id', [26,34])->get();
        $bravo3rd = Group::whereBetween('id', [35,42])->get();
        $charlie = Group::whereIn('id', [45,46,47,48,49,50])->get();
        $charlie2nd = Group::whereBetween('id', [51,53])->get();
        $charlie3rd = Group::whereBetween('id', [54,56])->get();
        $delta = Group::whereIn('id', [57,58,59])->get();
        $delta2nd = Group::whereBetween('id', [60,64])->get();
        $delta3rd = Group::whereBetween('id', [65,66])->get();

        $recruits = VPF::where('assignment_id',156)->get();
        $discharges = VPF::discharged()->get();

        return view('frontend.structure-assignment')
            ->with('enlistedRanks',$enlistedRanks)
            ->with('warrantRanks',$warrantRanks)
            ->with('officerRanks',$officerRanks)
            ->with('command', $command)
            ->with('alphaCommand', $alpha)
            ->with('alphaViking', $alphaViking)
            ->with('alphaWolf', $alphaWolf)
            ->with('bravo', $bravo)
            ->with('bravo2nd', $bravo2nd)
            ->with('bravo3rd', $bravo3rd)
            ->with('charlie', $charlie)
            ->with('charlie2nd', $charlie2nd)
            ->with('charlie3rd', $charlie3rd)
            ->with('delta', $delta)
            ->with('delta2nd', $delta2nd)
            ->with('delta3rd', $delta3rd)
            ->with('recruits', $recruits)
            ->with('discharges', $discharges);

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
     * Display the Modpack page.
     *
     * @return Response
     */
    public function modpack()
    {
        return view('frontend.modpack');
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

    public function disciplinary()
    {
        return view('frontend.policies.disciplinary');
    }

    /**
     * Returns the Squad XML for the Unit
     */
    public function squadXML()
    {
        $vpfs = VPF::where('status','=','Active')->get();
        $xml = '<?xml version="1.0"?>'. PHP_EOL;
        $xml .= '<!DOCTYPE squad SYSTEM "squad.dtd">'. PHP_EOL;
        $xml .= '<?xml-stylesheet href="squad.xsl" type="text/xsl"?>'. PHP_EOL;
        $xml .= '<squad nick="1RRF">'. PHP_EOL;
        $xml .= '<name>1st Rapid Response Force</name>'. PHP_EOL;
        $xml .= '<email>contactus@1st-rrf.com</email>'. PHP_EOL;
        $xml .= '<web>1st-rrf.com</web>'. PHP_EOL;
        $xml .= '<picture>logo.paa</picture>'. PHP_EOL;
        $xml .= '<title>1st Rapid Response Force</title>'. PHP_EOL;
        foreach($vpfs as $vpf)
        {
            $xml .= '<member id="'.$vpf->user->steam_id.'" nick="'.$vpf.'">'. PHP_EOL;
            $xml .= '<name>'.$vpf->first_name.' '.$vpf->last_name.'</name>'. PHP_EOL;
            $xml .= '<email>'.$vpf->user->email.'</email>'. PHP_EOL;
            $xml .= '<icq>N/A</icq>'. PHP_EOL;
            $xml .= '<remark>1st Rapid Response Force Member - '.$vpf->assignment->name.' - '.$vpf->assignment->group->name.'</remark>'. PHP_EOL;
            $xml .= '</member>'. PHP_EOL;
        }
        $xml .= '</squad>'. PHP_EOL;

        //Save to file system just in case
        $file = fopen(public_path().'/squad.xml','w');
        fwrite($file,$xml);
        fclose($file);

        return Response::make($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function getInfil()
    {
        $now = new Carbon();
        $infil = InfilAnnouncements::where('published',true)->orderBy('publish_date', 'desc')->get();
        return view('frontend.infil')->with('articles',$infil);
    }

}
