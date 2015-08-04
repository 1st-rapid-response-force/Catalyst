<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';
    protected $guarded = [];

    /**
     * The Group the Assignment belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function member()
    {
        return $this->hasOne('App\VPF');
    }

    public function mos()
    {
        return $this->belongsTo('App\MOS');
    }
}
