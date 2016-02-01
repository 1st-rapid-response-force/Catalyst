<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfilAnnouncements extends Model
{
    protected $guarded = [];

    protected $dates = array('publish_date');


    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vpf()
    {
        return $this->belongsTo('App\VPF');
    }
}
