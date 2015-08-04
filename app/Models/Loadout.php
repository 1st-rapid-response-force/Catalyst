<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loadout extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loadouts_items';

    /**
     * Returns the required qualification for this item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualification()
    {
        return $this->belongsTo('App\Qualification');
    }

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsToMany('App\VPF', 'loadouts_vpf', 'loadout_id', 'vpf_id');
    }
}
