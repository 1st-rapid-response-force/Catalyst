<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class AdminPermissions
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
        if(!($this->auth->user()->hasRole(['officer','superadmin'])))
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                \Log::info('USER ATTEMPTED TO ACCESS BACKEND SYSTEM!', ['id'=> $this->auth->user()->id]);
                \Notification::error('You do not have permission to access this. Your attempt has been logged and reported.');
                return redirect('/');
            }
        }
        return $next($request);
    }
}
