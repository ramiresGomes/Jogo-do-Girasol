<?php

namespace Square\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web_member')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/membro/entrar');
        }

        return $next($request);
    }
}