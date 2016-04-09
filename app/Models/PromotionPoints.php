<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PromotionPoints
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property integer $model_id
 * @property string $model_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereModelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereModelType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PromotionPoints whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PromotionPoints extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotion_points';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }

    /**
     * Get all of the owning models.
     */
    public function model()
    {
        return $this->morphTo();
    }


}
