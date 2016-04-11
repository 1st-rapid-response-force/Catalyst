<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VPF
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $searchable
 * @property integer $user_id
 * @property integer $assignment_id
 * @property integer $rank_id
 * @property integer $face_id
 * @property string $status
 * @property integer $clearance
 * @property string $avatar
 * @property boolean $oncall_status
 * @property string $oncall_phone
 * @property string $oncall_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \App\Rank $rank
 * @property-read \App\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Operation[] $operations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Qualification[] $qualifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Perstat[] $perstat
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ribbon[] $ribbons
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\School[] $schools
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article15[] $article15
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VCS[] $vcs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NCS[] $ncs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InfilAnnouncements[] $infils
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InfractionReport[] $infraction_reports
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FileCorrection[] $file_corrections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AssignmentChange[] $assignment_changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DCS[] $dcs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Discharge[] $discharges
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service_History[] $serviceHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RangeQualification[] $range_scores
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Promotion[] $promotions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PromotionPoints[] $promotionsPoints
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OnCall[] $onCallRequests
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Loadout[] $loadout
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Teamspeak[] $teamspeak
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SchoolTrainingDate[] $schoolTrainingDate
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereSearchable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereAssignmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereRankId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereFaceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereClearance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereOncallStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereOncallPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereOncallType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VPF whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VPF extends Model
{
    protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vpf';

    public function __toString()
    {
        // Non-Ranking User
        if($this->rank->id == 1)
        {
            return $this->last_name.'.'.$this->first_name[0];
        } else {
            return $this->rank->abbreviation.'. '.$this->last_name.'.'.$this->first_name[0];
        }

    }

    /**
     * Returns User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Returns Rank
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rank()
    {
        return $this->belongsTo('App\Rank');
    }

    /**
     * Returns Assignment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }

    /**
     * Returns all Operations
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function operations()
    {
        return $this->belongsToMany('App\Operation', 'operations_vpf', 'vpf_id', 'operation_id')->withPivot('date_attended');
    }

    /**
     * Returns all Operations
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function qualifications()
    {
        return $this->belongsToMany('App\Qualification', 'qualifications_vpf', 'vpf_id', 'qualification_id')->withPivot('date_awarded');
    }

    /**
     * Returns all PERSTATS
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function perstat()
    {
        return $this->belongsToMany('App\Perstat', 'perstat_vpf', 'vpf_id', 'perstat_id');
    }

    /**
     * Returns all Ribbons
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function ribbons()
    {
        return $this->belongsToMany('App\Ribbon', 'ribbons_vpf', 'vpf_id', 'ribbon_id')->withPivot('date_awarded');
    }

    /**
     * Returns all Schools
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function schools()
    {
        return $this->belongsToMany('App\School', 'schools_vpf', 'vpf_id', 'school_id')->withPivot(['date_attended','completed']);
    }

    public function article15()
    {
        return $this->hasMany('App\Article15','vpf_id','id');
    }

    /**
     * Returns all Verbal Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vcs()
    {
        return $this->hasMany('App\VCS','vpf_id','id');
    }

    /**
     * Returns all Negative Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ncs()
    {
        return $this->hasMany('App\NCS','vpf_id','id');
    }

    /**
     * Returns all Infil News
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infils()
    {
        return $this->hasMany('App\InfilAnnouncements','vpf_id','id');
    }

    /**
     * Returns all Incident Reports
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infraction_reports()
    {
        return $this->hasMany('App\InfractionReport','vpf_id','id');
    }

    /**
     * Returns all events created by VPF
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsCreated()
    {
        return $this->hasMany('App\Event','vpf_id','id');
    }

    /**
     * Returns all File Corrections
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function file_corrections()
    {
        return $this->hasMany('App\FileCorrection','vpf_id','id');
    }

    /**
     * Returns all Assignment Change Forms
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignment_changes()
    {
        return $this->hasMany('App\AssignmentChange','vpf_id','id');
    }

    /**
     * Returns all Developmental Counseling Statements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dcs()
    {
        return $this->hasMany('App\DCS','vpf_id','id');
    }

    /**
     * Returns all Discharges
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discharges()
    {
        return $this->hasMany('App\Discharge','vpf_id','id');
    }

    public function scopeDischarged($query)
    {
        return $query->where('status', 'General Discharge')
            ->orWhere('status', 'Honorable Discharge')
            ->orWhere('status', 'Administrative Discharge')
            ->orWhere('status', 'Other than Honorable Discharge')
            ->orWhere('status', 'Bad Conduct Discharge')
            ->orWhere('status', 'Dishonorable Discharge')
            ->orWhere('status', 'Retired')
            ->orWhere('status', 'Discharged');
    }

    /**
     * Returns all Service History
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceHistory()
    {
        return $this->hasMany('App\Service_History','vpf_id','id');
    }

    /**
     * Returns all Service History
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function range_scores()
    {
        return $this->hasMany('App\RangeQualification','vpf_id','id');
    }

    /**
     * Returns all Promotions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany('App\Promotion','vpf_id','id');
    }

    /**
     * Returns all Promotions Points
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotionsPoints()
    {
        return $this->hasMany('App\PromotionPoints');
    }

    /**
     * Returns all On Call Requests
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onCallRequests()
    {
        return $this->hasMany('App\OnCall','vpf_id','id');
    }


    /**
     * Returns Users current Loadout
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function loadout()
    {
        return $this->belongsToMany('App\Loadout', 'loadouts_vpf', 'vpf_id', 'loadout_id');
    }

    /**
     * Returns all Service History
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamspeak()
    {
        return $this->hasMany('App\Teamspeak','vpf_id','id');
    }

    /**
     * Returns all Training Dates user has signed up for
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schoolTrainingDate()
    {
        return $this->belongsToMany('App\SchoolTrainingDate', 'school_training_date_user', 'vpf_id', 'school_date_id');
    }

    public function isMember()
    {

    }

    // Query Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function hasReportedIn()
    {
        $perstat = Perstat::where('active','=','1')->first();

        if($perstat->VPF->contains($this->id))
            return true;

        return false;
    }

    public function onCall()
    {
        if($this->oncall_status)
        {
            return true;
        }
        return false;

    }
    public function onCallPhoneEnabled()
    {
        $phone = $this->oncall_phone;
        if(!empty($phone))
            return true;
        return false;
    }
}
