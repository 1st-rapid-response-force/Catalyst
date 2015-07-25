<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'awards';

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('VPF', 'VPF_awards', 'vpf_id', 'award_id')->withPivot('date_awarded');
    }

    /**
     * Get all of the award promotion points distributed.
     */
    public function promotionPoints()
    {
        return $this->morphMany('App\PromotionPoints', 'model');
    }

}
