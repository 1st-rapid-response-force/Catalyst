<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Promotion
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property integer $old_rank_id
 * @property integer $new_rank_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereOldRankId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereNewRankId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Promotion whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Promotion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotions';
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
