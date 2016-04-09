<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SquadAnnouncements
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $vpf_id
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $creator
 * @property-read \App\Group $group
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadAnnouncements whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SquadAnnouncements extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'squad_announcements';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File of Announcement Creator
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\VPF','vpf_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
