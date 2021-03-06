<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotAccountsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'accounts_user')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/user/accounts/login');
        }
        return $next($request);
    }
}
