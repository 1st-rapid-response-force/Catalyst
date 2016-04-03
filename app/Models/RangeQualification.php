<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RangeQualification extends Model
{
    protected $guarded = [];

    public function __toString()
    {
        $weapons = collect([
            'SMA_Mk16_black' => "MK16 SCAR-L"
        ]);

        if($weapons->has($this->weapon))
            return $weapons->get($this->weapon);

        return "Weapon Not Specified";
    }

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
