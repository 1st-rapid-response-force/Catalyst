<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article15 extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article15';

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
