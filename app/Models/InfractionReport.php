<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InfractionReport
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $violator_name
 * @property string $violation_summary
 * @property boolean $reviewed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereViolatorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereViolationSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereReviewed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InfractionReport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InfractionReport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'infraction_reports';
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