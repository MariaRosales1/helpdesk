<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionConsultantMiddleware
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
        define('CONSULTANT', 'consultant');
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::user()->rol != CONSULTANT ) {
            return redirect('/home');
         }

        return $next($request);
    }
}
