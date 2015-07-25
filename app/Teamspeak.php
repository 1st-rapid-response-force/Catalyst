<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamspeak extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teamspeak';

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
