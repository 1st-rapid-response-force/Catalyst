<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mos';

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }

    public function rankLimitation()
    {
        return $this->belongsTo('App\Rank','id','rank_limitation_id');
    }

}
