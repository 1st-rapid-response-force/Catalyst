<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DCS
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $name
 * @property string $grade
 * @property string $date
 * @property string $organization
 * @property string $counselor_name
 * @property string $reason_counseling
 * @property string $key_points
 * @property string $plan_of_action
 * @property string $assessment
 * @property string $assessment_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereCounselorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereReasonCounseling($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereKeyPoints($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS wherePlanOfAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereAssessment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereAssessmentDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DCS whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DCS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dcs';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }
}
