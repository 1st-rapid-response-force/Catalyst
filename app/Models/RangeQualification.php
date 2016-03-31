<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RangeQualification extends Model
{
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
