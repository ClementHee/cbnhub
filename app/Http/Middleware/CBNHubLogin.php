<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CBNHubLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {
        if (session('login_type') !== 'cbnhub') {
            abort(403, 'Unauthorized. You did not log in via CBNHUB.');
        }

        return $next($request);
    }
}
