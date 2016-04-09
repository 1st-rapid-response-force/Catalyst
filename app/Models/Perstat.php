<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Perstat
 *
 * @property integer $id
 * @property string $from
 * @property string $to
 * @property string $unit
 * @property integer $assigned
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VPF[] $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereAssigned($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Perstat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
