<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Service_History
 *
 * @property integer $id
 * @property integer $vpf_id
 * @property string $note
 * @property string $date
 * @property integer $model_id
 * @property string $model_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\VPF $VPF
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereModelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereModelType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Service_History whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service_History extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_history';
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
