<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RangeQualification
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $range
 * @property integer $score
 * @property integer $scoreMax
 * @property string $weapon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereRange($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereScoreMax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereWeapon($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RangeQualification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

        return $this->weapon;
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
