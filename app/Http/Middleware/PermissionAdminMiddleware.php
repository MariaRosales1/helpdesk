<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionAdminMiddleware 
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
        define('ADMIN', 'admin');
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (Auth::user()->rol != ADMIN ) {
            return redirect('/home');
         }

        return $next($request);
    }
}
