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
     * Returns all members who are currently on call
     */
    public function oncallMembers()
    {
        return VPF::where('oncall_type','=',$this->oncall_type)->get();
    }

}
