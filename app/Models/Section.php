<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Section
 *
 * @property integer $id
 * @property integer $school_id
 * @property integer $order
 * @property string $name
 * @property string $documentation_url
 * @property string $content
 * @property string $video
 * @property integer $next_section
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\School $school
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereSchoolId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereDocumentationUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereNextSection($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Section extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sections';
    protected $guarded = [];

    /**
     * Returns School that section belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School','school_id');
    }
}
