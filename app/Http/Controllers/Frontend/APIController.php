<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function getLoadout($uuid)
    {
        $user = User::where('steam_id','=', $uuid)->first();

        //If not user found
        if(is_null($user))
        {
            abort('404');
        }

        $loadout = collect([
            'steam_id' => $user->steam_id,
            'vpf_name' => $user->vpf->__toString(),
            'loadout' => $user->vpf->loadout()->where('empty','=',0)->get()
            ]);
        return $loadout->toJson();


    }
}
