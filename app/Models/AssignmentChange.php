<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentChange extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignment_changes';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }

    public function requestedAssignment()
    {
        return $this->belongsTo('App\Assignment','requested_assignment','id');
    }
}
