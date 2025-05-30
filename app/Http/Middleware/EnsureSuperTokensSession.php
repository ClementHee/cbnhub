<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EnsureSuperTokensSession
{
    public function handle(Request $request, Closure $next)
    {
        $accessToken = $request->cookie('sAccessToken') ?? $request->bearerToken();
dd($accessToken);
        if (!$accessToken) {
        
            return redirect('/dashboard'); // or abort(401)
        }

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ])->get('https://localhost:3001/auth/session/verify');

        if (!$response->successful()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
