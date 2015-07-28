<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

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
        return view('frontend.home');
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
        return view('frontend.structure-assignment');
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
        return view('frontend.contact');
    }

}
