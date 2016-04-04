<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        if($this->status == "Active")
        {
            return true;
        }
        return false;
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
