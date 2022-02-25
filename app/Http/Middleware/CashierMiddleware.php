<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CashierMiddleware
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
        if(auth()->user()->role == 'Cashier') {

        } elseif(auth()->user()->role == 'Admin') {
            abort(403);
        } elseif(auth()->user()->role == 'Manager') {
            abort(403);
        }

        return $next($request);
    }
}
