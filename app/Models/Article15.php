<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Article15
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $form_name
 * @property string $form_type
 * @property string $name
 * @property string $grade
 * @property string $military_id
 * @property string $current_date
 * @property string $misconduct
 * @property string $plea
 * @property string $plan_of_action
 * @property string $counselor_name
 * @property string $counselor_rank
 * @property string $counselor_organization
 * @property string $counselor_signature
 * @property string $counselor_sig_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereFormName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereFormType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereGrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereMilitaryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCurrentDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereMisconduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 wherePlea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 wherePlanOfAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCounselorName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCounselorRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCounselorOrganization($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCounselorSignature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCounselorSigDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article15 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article15 extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article15';
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
