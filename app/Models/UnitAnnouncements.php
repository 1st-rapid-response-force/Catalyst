<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UnitAnnouncements
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $subject
 * @property string $short_message
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $creator
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereShortMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UnitAnnouncements whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UnitAnnouncements extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unit_announcements';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File of Announcement Creator
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\VPF','vpf_id');
    }

}
