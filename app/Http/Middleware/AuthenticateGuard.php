<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateGuard
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        $request->session()->put('url.intended', $request->url());
        if ($guard == 'admin'){
            return redirect()->route('admin.loginForm');
            //Works fine
//            $cname = "App//User;
//            $i = new $cname;
        }

        return redirect()->route('employee.loginForm');

    }
}
