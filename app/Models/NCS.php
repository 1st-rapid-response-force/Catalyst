<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NCS
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
 * @property string $summary_infraction
 * @property string $action_plan
 * @property string $approval
 * @property string $commander_name
 * @property string $commander_rank
 * @property string $commander_assignment
 * @property string $approval_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereCounselorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereSummaryInfraction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereActionPlan($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereApproval($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereCommanderName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereCommanderRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereCommanderAssignment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereApprovalDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NCS whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NCS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ncs';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
