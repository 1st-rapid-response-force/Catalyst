<?php

namespace App\Http\Controllers\Frontend;

use App\RangeQualification;
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

    public function getIsMember($uuid)
    {
        $user = User::where('steam_id','=', $uuid)->first();

        //If not user found
        if(is_null($user))
        {
            return response()->json(['steam_id' => $uuid, 'member' => 'false']);
        }

        if($user->vpf->isMember())
        {
            return response()->json(['steam_id' => $uuid, 'member' => 'true']);
        } else {
            return response()->json(['steam_id' => $uuid, 'member' => 'false']);
        }


    }

    public function postQualification(Request $request)
    {
        $user = User::where('steam_id','=', $request->steam_id)->first();
        if(!isset($user))
        {
            return response()->make("No User Found with that Steam ID",422);
        }

        // If the score exceeds the max score, there has been a Fusion error.
        // We will set the score to the acceptable level from max
        if($request->score >= $request->scoreMax)
        {
            $score = ($request->scoreMax-rand(0,3));

        }


        $qualification = [
            'range' => $request->range,
            'score' => $score,
            'scoreMax' => $request->scoreMax,
            'weapon' => $request->weapon,
        ];

        \Log::warning('FUSION: The score that was saved was inaccurate, score modified and capped to max', ['request'=> $qualification]);
        $user->vpf->range_scores()->create($qualification);
        return response()->make("Success",200);
    }
}
