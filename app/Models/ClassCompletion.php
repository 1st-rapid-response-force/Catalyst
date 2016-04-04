<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCompletion extends Model
{
    protected $guarded = [];


    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }

    public function date()
    {
        return $this->belongsTo('App\SchoolTrainingDate','date_id','id');
    }
}
