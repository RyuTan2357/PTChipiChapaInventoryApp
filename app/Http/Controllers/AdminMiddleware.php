<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role() !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}