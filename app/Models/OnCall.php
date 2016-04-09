<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OnCall
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $oncall_type
 * @property string $grid
 * @property string $callsign
 * @property string $urgency
 * @property string $security
 * @property string $other
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereOncallType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereGrid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereCallsign($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereUrgency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereSecurity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereOther($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\OnCall whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo('App\VPF','vpf_id','id');
    }

    /**
     * Returns all members who are currently on call
     */
    public function oncallMembers()
    {
        return VPF::where('oncall_type','=',$this->oncall_type)->get();
    }

    public function getUrgency()
    {
        //Sort Items based on category
        switch ($this->urgency) {
            case 'A':
                return '<span class="label label-danger">URGENT</span>';
                break;
            case 'B':
                return '<span class="label label-danger">URGENT-SECONDARY</span>';
                break;
            case 'C':
                return '<span class="label label-warning">PRIORITY</span>';
                break;
            case 'D':
                return '<span class="label label-success">ROUTINE</span>';
                break;
            case 'E':
                return '<span class="label label-success">CONVENIENCE</span>';
                break;
            default:
                return '<span class="label label-success">CONVENIENCE</span>';
        }
    }

    public function getSecurity()
    {
        //Sort Items based on category
        switch ($this->security) {
            case 'N':
                return '<span class="label label-success">NO ENEMY TROOPS</span>';
                break;
            case 'P':
                return '<span class="label label-warning">POSSIBLE ENEMY</span>';
                break;
            case 'E':
                return '<span class="label label-warning">ENEMY TROOPS (CAUTION)</span>';
                break;
            case 'X':
                return '<span class="label label-danger">ENEMY TROOPS (ARMED ESCORT)</span>';
                break;
            case 'NA':
                return '<span class="label label-primary">NOT APPLICABLE</span>';
                break;
            default:
                return '<span class="label label-primary">NOT APPLICABLE</span>';
        }
    }

}
