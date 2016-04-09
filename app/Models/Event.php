<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Event extends Eloquent implements \MaddHatter\LaravelFullcalendar\IdentifiableEvent
{
    protected $guarded = [];
    protected $dates = ['start', 'end'];

    // Relationships

    public function category()
    {
        return $this->belongsTo('App\EventCategory');
    }

    // Query Scopes
    public function scopeAdmin($query)
    {
        return $query->whereIn('category_id', [1,2,3,4,5]);
    }

    // Model Functions
    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}
