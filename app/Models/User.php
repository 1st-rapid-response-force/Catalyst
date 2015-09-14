<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, BillableContract
{
    use EntrustUserTrait;
    use Messagable;
    use Authenticatable, CanResetPassword;
    use Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'steam_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function vpf()
    {
        return $this->hasOne('App\VPF');
    }
    public function application()
    {
        return $this->hasOne('App\Application');
    }

}
