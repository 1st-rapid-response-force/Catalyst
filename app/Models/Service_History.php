<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_History extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_history';

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }

}
