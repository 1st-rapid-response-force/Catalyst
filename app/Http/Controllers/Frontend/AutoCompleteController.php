<?php

namespace App\Http\Controllers\Frontend;

use App\VPF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AutoCompleteController extends Controller
{
    public function getUsers(Request $request)
    {
        $vpfs = VPF::where('first_name','LIKE','%'.$request->q.'%')
            ->orWhere('last_name','LIKE','%'.$request->q.'%')->get();
        $results = collect();
        foreach($vpfs as $vpf)
        {
            $rt = ['id' => $vpf->user->id,
                'name' => $vpf->__toString(),];
            $results->push($rt);
        }
        return \Response::json($results);
    }

    public function getVPFs(Request $request)
    {
        $vpfs = VPF::where('searchable', 'LIKE', '%'.$request->q.'%')->get();
        $results = collect();

        foreach ($vpfs as $vpf)
        {
            $rt = [
                'id' => $vpf->user->id,
                'text' => $vpf->searchable
            ];
            $results->push($rt);
        }
        return \Response::json(['results' => $results]);
    }
}
