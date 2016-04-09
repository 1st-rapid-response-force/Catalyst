<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Application
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property string $first_name
 * @property string $last_name
 * @property string $dob
 * @property string $nationality
 * @property integer $mos_id
 * @property boolean $milsim_experience
 * @property boolean $milsim_badconduct
 * @property string $milsim_grouplist
 * @property string $milsim_highestrank
 * @property string $milsim_previoustraining
 * @property string $milsim_depature
 * @property boolean $agreement_milsim
 * @property boolean $agreement_guidelines
 * @property boolean $agreement_orders
 * @property boolean $agreement_ranks
 * @property string $signature
 * @property string $signature_date
 * @property string $processed_name
 * @property string $processed_paygrade
 * @property string $processed_unitname
 * @property string $processed_signature
 * @property string $processed_statement
 * @property string $decision_name
 * @property string $decision_paygrade
 * @property string $decision_unitname
 * @property string $decision_signature
 * @property string $decision_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\User $user
 * @property-read \App\MOS $mos
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDob($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereNationality($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMosId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimBadconduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimGrouplist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimHighestrank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimPrevioustraining($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereMilsimDepature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereAgreementMilsim($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereAgreementGuidelines($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereAgreementOrders($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereAgreementRanks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereSignature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereSignatureDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereProcessedName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereProcessedPaygrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereProcessedUnitname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereProcessedSignature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereProcessedStatement($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDecisionName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDecisionPaygrade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDecisionUnitname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDecisionSignature($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDecisionDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Application whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','dob'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function mos()
    {
        return $this->belongsTo('App\MOS');
    }
}
