<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ClassCompletion
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property integer $date_id
 * @property string $form_name
 * @property string $form_type
 * @property integer $status
 * @property string $attendees
 * @property string $observers
 * @property string $helpers
 * @property string $comments
 * @property string $rewards
 * @property string $issues
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @property-read \App\SchoolTrainingDate $date
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereDateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereAttendees($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereObservers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereHelpers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereComments($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereRewards($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereIssues($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClassCompletion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClassCompletion extends Model
{
    protected $guarded = [];


    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }

    public function date()
    {
        return $this->belongsTo('App\SchoolTrainingDate','date_id','id');
    }
}
