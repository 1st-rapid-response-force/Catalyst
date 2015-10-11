<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnCall extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oncall';

    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'oncall_vpf', 'oncall_id', 'vpf_id');
    }

    /**
     * Returns On Call Information or False Boolean
     * @return Array or Boolean
     */
    public function onCall()
    {
        $oncallUser = $this->VPF;
        $members = VPF::where('status','=','Active')->get();
        $members = $members->diff($reportedIn);
        return $members;
    }

}
