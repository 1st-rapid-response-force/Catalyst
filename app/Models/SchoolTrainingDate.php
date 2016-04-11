<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SchoolTrainingDate
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $date
 * @property integer $responsible_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $status
 * @property-read \App\School $school
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VPF[] $VPF
 * @property-read \App\VPF $instructor
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereSchoolId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereResponsibleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SchoolTrainingDate whereStatus($value)
 * @mixin \Eloquent
 */
class SchoolTrainingDate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_training_date';
    protected $guarded = [];
    protected $dates = ['date'];

    /**
     * Returns School
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo('App\School','school_id','id');
    }

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'school_training_date_user', 'school_date_id', 'vpf_id');
    }

    public function instructor()
    {
        return $this->belongsTo('App\VPF','responsible_id','id');
    }
}
