<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }
}
