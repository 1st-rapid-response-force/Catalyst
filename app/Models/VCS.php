<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VCS
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
 * @property string $summary_interaction
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereCounselorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereSummaryInteraction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VCS whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VCS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vcs';
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
