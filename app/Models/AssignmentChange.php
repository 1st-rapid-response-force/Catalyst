<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AssignmentChange
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $name
 * @property string $grade
 * @property string $date
 * @property string $organization
 * @property string $request_reason
 * @property boolean $approved
 * @property integer $requested_assignment
 * @property string $approved_by
 * @property boolean $reviewed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @property-read \App\Assignment $requestedAssignment
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereRequestReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereApproved($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereRequestedAssignment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereApprovedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereReviewed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AssignmentChange whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AssignmentChange extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignment_changes';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }

    public function requestedAssignment()
    {
        return $this->belongsTo('App\Assignment','requested_assignment','id');
    }
}
