<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sections';
    protected $guarded = [];

    /**
     * Returns School that section belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School','school_id');
    }
}
