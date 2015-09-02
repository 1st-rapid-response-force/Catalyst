<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perstat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perstat';

    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'perstat_vpf', 'perstat_id', 'vpf_id');
    }

    public function report_percentage()
    {
        $reportin = $this->VPF->count();
        $percentage = ($reportin/$this->assigned)*100;
        return round($percentage,2);
    }

    public function pendingReportIn()
    {
        $reportedIn = $this->VPF;
        $members = VPF::where('status','=','Active')->get();
        $members = $members->diff($reportedIn);
        return $members;
    }

}
