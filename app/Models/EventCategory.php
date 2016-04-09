<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany('App\Event','category_id','id');
    }
}
