<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionPoints extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotion_points';

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
