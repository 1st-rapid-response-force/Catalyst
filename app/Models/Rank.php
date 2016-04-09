<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rank
 *
 * @property integer $id
 * @property string $abbreviation
 * @property string $name
 * @property string $pay_grade
 * @property string $storage_image
 * @property string $public_image
 * @property integer $promotionPointsRequired
 * @property integer $tigRequired
 * @property string $trainingRequired
 * @property integer $weight
 * @property integer $next_rank
 * @property integer $teamspeakGroup
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VPF[] $VPF
 * @property-read \App\Rank $nextRank
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereAbbreviation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank wherePayGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereStorageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank wherePublicImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank wherePromotionPointsRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereTigRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereTrainingRequired($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereNextRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereTeamspeakGroup($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rank whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rank extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ranks';
    protected $guarded = [];

    /**
     * Returns VPF'
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function VPF()
    {
        return $this->hasMany('App\VPF');
    }

    /**
     * Return next rank
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nextRank()
    {
        return $this->hasOne('App\Rank','id','next_rank');
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
