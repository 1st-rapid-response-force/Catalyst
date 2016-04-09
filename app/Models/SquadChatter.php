<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SquadChatter
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $vpf_id
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $creator
 * @property-read \App\Group $group
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SquadChatter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SquadChatter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'squad_chatter';
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
