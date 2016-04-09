<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Assignment
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $mos_id
 * @property string $name
 * @property boolean $entry_level
 * @property boolean $transfer_open
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Group $group
 * @property-read \App\VPF $member
 * @property-read \App\MOS $mos
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereMosId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereEntryLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereTransferOpen($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Assignment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Assignment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';
    protected $guarded = [];

    /**
     * The Group the Assignment belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function member()
    {
        return $this->hasOne('App\VPF');
    }

    public function mos()
    {
        return $this->belongsTo('App\MOS');
    }
}
