<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    const Admin_Role = 0;
    const Mod_Role = 1;
    const Mod = 2;
    const Member = 3;
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role > self::Mod){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
