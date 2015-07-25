<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ranks';

    /**
     * Returns VPF'
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function VPF()
    {
        return $this->hasMany('VPF');
    }

    /**
     * Return next rank
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nextRank()
    {
        return $this->hasOne('App\Rank','id','next_rank');
    }


}
