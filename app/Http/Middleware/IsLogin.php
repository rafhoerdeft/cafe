<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return back();
        }

        // Check if session auth true
        // if ($request->session()->get('log') !== null) {
        //     return back();
        // } else {
        //     // If false check remember cookies
        //     if ($this->getRememberCookies($request) !== null) {
        //         if (Auth::loginUsingId($this->getRememberId($request), true)) {
        //             session()->put('log', Auth::user()->role->nama_role);
        //             session()->put('log_uid', encode(Auth::user()->id));
        //             return back();
        //         }
        //     }
        // }

        return $next($request);
    }
}
