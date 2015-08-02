<?php

namespace App\Http\Controllers\Backend;

use App\School;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AutoCompleteController extends Controller
{
    public function getCourses(Request $request)
    {
        $vpfs = School::where('name','LIKE','%'.$request->q.'%')->get();
        $results = collect();
        foreach($vpfs as $vpf)
        {
            $rt = ['id' => $vpf->id,
                'name' => $vpf->name,];
            $results->push($rt);
        }

        return \Response::json($results);
    }
}
