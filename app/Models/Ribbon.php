<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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


}
