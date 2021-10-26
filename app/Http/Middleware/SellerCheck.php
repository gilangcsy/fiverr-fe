<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! session()->has('accessToken')) {
            if (! session()->has('roleCheck')) {
                if($request->session()->get('roleCheck') != 1) {
                    return redirect()->route('auth.index');
                }
                return redirect()->route('auth.index');
            }
        return redirect()->route('auth.index');
        }
        return $next($request);

    }
}
