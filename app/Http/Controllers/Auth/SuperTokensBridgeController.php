<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class SuperTokensBridgeController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.pages.auth.login');
    }

    public function showRegisterForm()
    {
        return view('livewire.pages.auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->withOptions([
            'verify' => base_path('certs/cert.pem'), // ignore SSL if using localhost
        ])->post('https://localhost:3001/auth/signin', [
            'formFields' => [
                ['id' => 'email', 'value' => $request->email],
                ['id' => 'password', 'value' => $request->password],
            ]
        ]);

        if ($response->successful()) {
            // Optionally get user info
            $userId = $response->json()['user']['id'] ?? null;
            session(['user_id' => $userId]);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Login failed: ' . ($response->json()['message'] ?? 'Unknown error'),
        ]);
    }

    public function register(Request $request)
    {
        dd('here');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->withOptions([
            base_path('certs/cert.pem')
        ])->post('https://localhost:3001/auth/signup', [
            'formFields' => [
                ['id' => 'email', 'value' => $request->email],
                ['id' => 'password', 'value' => $request->password],
            ]
        ]);

     

        if ($response->successful()) {
            $userId = $response->json()['user']['id'] ?? null;
            session(['user_id' => $userId]);
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Register failed: ' . ($response->json()['message'] ?? 'Unknown error'),
        ]);
    }

    public function logout(Request $request)
    {
        session()->forget('user_id');

        // Optional: tell SuperTokens to revoke session
        Http::withOptions(['verify' => false])->post('https://localhost:3001/auth/signout');

        return redirect('/login');
    }
}

