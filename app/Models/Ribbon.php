<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ribbon
 *
 * @property integer $id
 * @property string $name
 * @property string $storage_image
 * @property string $public_image
 * @property string $description
 * @property \Illuminate\Database\Eloquent\Collection|\App\PromotionPoints[] $promotionPoints
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VPF[] $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereStorageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon wherePublicImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon wherePromotionPoints($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ribbon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ribbon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ribbons';

    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'ribbons_vpf', 'ribbon_id', 'vpf_id')->withPivot('date_awarded');
    }

    /**
     * Get all of the promotion points distributed.
     */
    public function promotionPoints()
    {
        return $this->morphMany('App\PromotionPoints', 'model');
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
