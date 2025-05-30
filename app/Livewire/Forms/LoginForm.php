<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginForm extends Form
{
    public string $email = '';
    public string $password = '';

    public function login()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->withOptions([
            'verify' => false, // only for local dev
        ])->post('http://localhost:3001/auth/signin', [
            'formFields' => [
                ['id' => 'email', 'value' => $this->email],
                ['id' => 'password', 'value' => $this->password],
            ]
        ]);

        if ($response->successful()) {
            $userId = $response->json('user.id');
            session(['user_id' => $userId]);
            return redirect()->to('/dashboard');
        }

        $this->addError('email', $response->json('message') ?? 'Login failed.');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
