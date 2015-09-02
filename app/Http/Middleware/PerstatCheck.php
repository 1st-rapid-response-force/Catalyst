<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class PerstatCheck
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->vpf->hasReportedIn())
        {
            return $next($request);
        } else {
            \Notification::error('You need to report in before you can access any other section of this website.');
            return redirect('/my-squad');
        }

    }
}
