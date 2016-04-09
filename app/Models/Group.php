<?php

namespace App;

use App\UnitAnnouncements;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Group
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Assignment[] $assignments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SquadAnnouncements[] $announcements
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SquadChatter[] $chatter
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';
    protected $guarded = [];

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

    public function squad_report_percentage()
    {
        $members = $this->members;
        if(count($members) > 0)
        {
            $perstat = Perstat::where('active','=','1')->first();
            $reportin = 0;
            //compile a list of squad members who have completed the PERSTAT
            foreach($perstat->VPF as $vpf)
            {

                if(is_null($vpf))
                    break;
                if($members->contains($vpf->id))
                    $reportin += 1;
            }
            return round((($reportin/$members->count())*100),2);
        } else {
            return 'NA - ';
        }


    }

}
