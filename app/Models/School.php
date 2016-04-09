<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\School
 *
 * @property integer $id
 * @property string $name
 * @property string $storage_image
 * @property string $public_image
 * @property string $short_description
 * @property string $description
 * @property string $docs
 * @property string $videos
 * @property \Illuminate\Database\Eloquent\Collection|\App\PromotionPoints[] $promotionPoints
 * @property string $prerequisites
 * @property string $oneofcourses
 * @property integer $minimumRankRequired
 * @property boolean $published
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VPF[] $VPF
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SchoolTrainingDate[] $schoolDate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Section[] $sections
 * @method static \Illuminate\Database\Query\Builder|\App\School whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereStorageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School wherePublicImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereShortDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereDocs($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereVideos($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School wherePromotionPoints($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School wherePrerequisites($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereOneofcourses($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereMinimumRankRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\School whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class School extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'schools_vpf', 'school_id', 'vpf_id')->withPivot(['date_attended']);
    }

    /**
     * Get all of the promotion points distributed.
     */
    public function promotionPoints()
    {
        return $this->morphMany('App\PromotionPoints', 'model');
    }

    /**
     * Returns all School Dates Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schoolDate()
    {
        return $this->hasMany('App\SchoolTrainingDate','school_id','id');
    }
    /**
     * Returns all School Dates Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany('App\Section','school_id','id')->orderBy('order','asc');
    }



    /**
     * Returns image
     * @return mixed
     */
    public function show()
    {
        if($this->public_image == 'placeholder.png')
        {
            $img = \Image::canvas(1, 1);
            $img = \Response::make($img->encode('png'));
            $img->header('Content-Type', 'image/png');
            return $img;
        }
        $content = \Cloudder::show($this->public_image);
        return $content;
    }

    /**
     * Returns image small
     * @return mixed
     */
    public function showSmall()
    {
        if($this->public_image == 'placeholder.png')
        {
            $img = \Image::canvas(1, 1);
            $img = \Response::make($img->encode('png'));
            $img->header('Content-Type', 'image/png');
            return $img;
        }
        $content = \Cloudder::show($this->public_image,['width' => '100','height'=>'100','crop'=>'fit']);
        return $content;
    }
}
