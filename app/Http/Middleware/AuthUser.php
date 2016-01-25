<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AuthUser
{
    /**
    * Handle an incoming request. Denies the user access to the profiles if not admin
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $params = $request->route()->parameters();

        $user_id = $params['profiles'];

        if ($request->user()->isAdmin()) {
            return $next($request);
        }
        // for model binding
        if ($user_id == Auth::id()) {
            return $next($request);
        } else {
            return redirect('/');
        }

    }
}
