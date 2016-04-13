<?php

namespace App\Repositories\User\Steam;

    /**
     * Interface UserContract
     * @package App\Repositories\Frontend\User
     */
/**
 * Interface SteamContract
 * @package App\Repositories\Frontend\User\Steam
 */
interface SteamContract
{
    /**
     * @param $user
     * @param $steam_id
     * @return mixed
     */
    public function create($user, $steam_id);
    /**
     * @param $user
     * @return mixed
     */
    public function checkVAC($user);

    /**
     * @param $user
     * @return mixed
     */
    public function checkARMA($user);

    /**
     * @param $user
     * @return mixed
     */
    public function steamProfile($user);
}
