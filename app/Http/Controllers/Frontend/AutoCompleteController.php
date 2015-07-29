<?php

namespace App\Http\Controllers\Frontend;

use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AutoCompleteController extends Controller
{
    public function getUsers()
    {
        $vpfs = VPF::all();
        $results = [];
        foreach($vpfs as $vpf)
        {
            $rt = [
                'id' => $vpf->user->id,
                'name' => $vpf->__toString(),
            ];
            array_push($results,$rt);
        }


        return \Response::json($results);
    }
}
