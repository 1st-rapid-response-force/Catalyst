<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Teamspeak
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $uuid
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Teamspeak whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Teamspeak extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teamspeak';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF');
    }
}
