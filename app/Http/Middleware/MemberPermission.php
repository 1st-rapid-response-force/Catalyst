<?php

namespace App\Http\Middleware;

use Closure;

class MemberPermission
{
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
