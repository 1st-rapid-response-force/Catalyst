<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTrainingDate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_training_date';
    protected $guarded = [];

    /**
     * Returns School
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School','school_id','id');
    }

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'school_training_date_user', 'school_date_id', 'vpf_id');
    }

    public function instructor()
    {
        return $this->belongsTo('App\VPF','responsible_id','id');
    }
}
