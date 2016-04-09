<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Qualification
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Loadout[] $loadoutItems
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereStorageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification wherePublicImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification wherePromotionPoints($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Qualification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Qualification extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qualifications';

    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'qualifications_vpf', 'qualification_id', 'vpf_id')->withPivot('date_awarded');
    }

    /**
     * Get all of the promotion points distributed.
     */
    public function promotionPoints()
    {
        return $this->morphMany('App\PromotionPoints', 'model');
    }

    /**
     * Returns all Loadout items relating to this qualification
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loadoutItems()
    {
        return $this->hasMany('App\Loadout','qualification_id','id');
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
