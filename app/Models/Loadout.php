<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Loadout
 *
 * @property integer $id
 * @property integer $qualification_id
 * @property string $category
 * @property string $name
 * @property string $class_name
 * @property string $storage_image
 * @property string $public_image
 * @property boolean $empty
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Qualification $qualification
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Loadout[] $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereQualificationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereClassName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereStorageImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout wherePublicImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereEmpty($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Loadout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Loadout extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loadouts_items';
    protected $guarded = [];

    /**
     * Returns the required qualification for this item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualification()
    {
        return $this->belongsTo('App\Qualification');
    }

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\Loadout', 'loadouts_vpf', 'loadout_id', 'vpf_id');
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
