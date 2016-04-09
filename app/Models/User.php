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

/**
 * App\User
 *
 * @property integer $id
 * @property string $email
 * @property integer $steam_id
 * @property integer $application_id
 * @property integer $vpf_id
 * @property string $password
 * @property boolean $okEmail
 * @property string $notify
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property boolean $stripe_active
 * @property string $stripe_id
 * @property string $stripe_subscription
 * @property string $stripe_plan
 * @property string $last_four
 * @property \Carbon\Carbon $trial_ends_at
 * @property \Carbon\Carbon $subscription_ends_at
 * @property-read \App\VPF $vpf
 * @property-read \App\Application $application
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cmgmyr\Messenger\Models\Message[] $messages
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cmgmyr\Messenger\Models\Participant[] $participants
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cmgmyr\Messenger\Models\Thread[] $threads
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSteamId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereApplicationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereVpfId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereOkEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereNotify($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStripeActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStripeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStripeSubscription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStripePlan($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastFour($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSubscriptionEndsAt($value)
 * @mixin \Eloquent
 */
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
