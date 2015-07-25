<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qualifications';

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('VPF', 'VPF_qualifications', 'vpf_id', 'qualification_id')->withPivot('date_awarded');
    }

    /**
     * Get all of the promotion points distributed.
     */
    public function promotionPoints()
    {
        return $this->morphMany('App\PromotionPoints', 'model');
    }
}
