<?php

namespace App\Repositories\Frontend\User\Steam;

use App\Models\Access\User\Steam;
use Steam as SteamAPI;
use App\Models\Access\User\User;



/**
 * Class EloquentUserRepository
 * @package App\Repositories\Frontend\User
 */
class EloquentSteamRepository implements SteamContract
{

    public function create($user, $steam_id)
    {
        $steam = $user->steam()->create([
            'steam_id' => $steam_id
        ]);

        return $steam;
    }

    public function checkVAC($user)
    {

        $player = SteamAPI::user($user->steam->steam_id);
        $vac = $player->GetPlayerBans()[0];
        if($vac->VACBanned)
        {
            $user->steam->vac_ban = true;
            $user->push();
            return true;
        }
        $user->steam->vac_ban = false;
        $user->push();
        return false;
    }

    public function checkARMA($user)
    {
        $player = SteamAPI::player($user->steam->steam_id);
        $hasARMA = $player->getOwnedGames(true,false,[107410]);
        if($hasARMA->count() > 0)
        {
            $user->steam->arma3 = true;
            $user->steam->arma3_expansion = true;
            $user->push();
            return true;
        }
        $user->steam->arma3 = false;
        $user->steam->arma3_expansion = false;
        $user->push();
        return false;
    }

    public function steamProfile($user)
    {

        $player = SteamAPI::player($user->steam->steam_id);
        $profile = collect();
        $arma = $player->getOwnedGames(true,false,[107410]);
        $profile->push(['arma_playtime' => $arma->playtimeForeverReadable]);

        // Put into Cache
        \Cache::put('steam_'.$user->steam->steam_id,$profile,120);
        return $profile;
    }

}