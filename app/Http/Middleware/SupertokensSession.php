<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class SupertokensSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = Http::withHeaders([
            'cookie' => $request->header('cookie'),
        ])->withOptions(['verify' => false])
          ->get('https://localhost:3001/sessioninfo');

        if ($response->status() !== 200) {
            abort(401, 'Unauthorized by SuperTokens');
        }

        $userId = $response->json('userId');
        $request->merge(['super_user_id' => $userId]);

        return $next($request);
    }
}
