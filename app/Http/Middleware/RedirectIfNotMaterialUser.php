<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotMaterialUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'material_user')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/user/material/login');
        }
        return $next($request);
    }
}
