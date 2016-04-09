<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Discharge
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $name
 * @property string $grade
 * @property string $date
 * @property string $organization
 * @property string $discharge_type
 * @property string $discharge_text
 * @property string $discharger_name
 * @property string $discharger_grade
 * @property string $discharger_organization
 * @property string $discharger_signature
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargeType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargeText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargerGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargerOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereDischargerSignature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discharge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Discharge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discharges';
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
