<?php

namespace App;

use App\UnitAnnouncements;
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
        return $this->hasManyThrough('App\VPF','App\Assignment','group_id','assignment_id');
    }

    public function announcements()
    {
        return $this->hasMany('App\SquadAnnouncements');
    }

    public function chatter()
    {
        return $this->hasMany('App\SquadChatter');
    }

    public function unitAnnouncements()
    {
        $announcements = UnitAnnouncements::all()->sortByDesc('created_at')->take(2);
        return $announcements;
    }

}
