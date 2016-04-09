<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FileCorrection
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $name
 * @property string $grade
 * @property string $date
 * @property string $organization
 * @property string $correction_summary
 * @property boolean $reviewed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereCorrectionSummary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereReviewed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FileCorrection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FileCorrection extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'file_corrections';
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
