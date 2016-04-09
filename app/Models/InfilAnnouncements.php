<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InfilAnnouncements
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $title
 * @property string $type
 * @property string $body
 * @property boolean $published
 * @property \Carbon\Carbon $publish_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $vpf
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements wherePublishDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfilAnnouncements whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InfilAnnouncements extends Model
{
    protected $guarded = [];

    protected $dates = array('publish_date');


    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vpf()
    {
        return $this->belongsTo('App\VPF');
    }
}
