<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The Assignments the group has
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }
    public function members()
    {
        return $this->hasManyThrough('App\VPF','App\Assignment','assignment_id','group_id');
        //return $this->hasManyThrough('App\Assignment','App\PersonnelFile','group_id','assignment_id');
    }
}
