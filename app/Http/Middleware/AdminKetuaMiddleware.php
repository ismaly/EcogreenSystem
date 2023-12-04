<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminKetuaMiddleware
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
        // Check if the user is authenticated and has the role of 'admin' or 'ketua'
        if (auth()->check() && in_array(auth()->user()->role, ['admin', 'ketua', 'tim'])) {
            return $next($request);
        }

        // Redirect or return an error response if the user is not authorized
        return redirect()->route('Home');
    }
}
