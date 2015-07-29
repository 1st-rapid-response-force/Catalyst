<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class MemberPermission
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
        if(!($this->auth->user()->hasRole(['member','nco','officer','superadmin'])))
        {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                \Log::info('User accessing Member section without VPF!', ['id'=> $this->auth->user()->id]);
                \Notification::error('You do not have permission to access this.');
                return redirect('/');
            }
        }
        return $next($request);
    }
}
