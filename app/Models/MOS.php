<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MOS
 *
 * @property integer $id
 * @property string $name
 * @property string $mos
 * @property integer $rank_limitation_id
 * @property string $image
 * @property string $description
 * @property string $requirements
 * @property string $video_embed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Assignment[] $assignments
 * @property-read \App\Rank $rankLimitation
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereMos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereRankLimitationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereRequirements($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereVideoEmbed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MOS whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MOS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mos';
    protected $guarded = [];

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }

    public function rankLimitation()
    {
        return $this->belongsTo('App\Rank','id','rank_limitation_id');
    }

}
