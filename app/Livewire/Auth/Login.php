<?php
namespace App\Livewire\Auth;

use Log;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Login extends Component
{    protected $redirectTo = '/dashboard';
    public string $email = '';
    public string $password = '';
    public string $error = '';

    #[Layout('layouts.guest')]


    public function login()
    {
        // Validate user input
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Call SuperTokens API for authentication
        $response = Http::withOptions([
            'verify' => false // Disable SSL verification (use with caution)
        ])->post(config('supertokens.api_url') . '/auth/signin', [
            'formFields' => [
                ['id' => 'email', 'value' => $this->email],
                ['id' => 'password', 'value' => $this->password],
            ],
        ]);

        // Check if response is successful
        $data = $response->json();
        if ($response->successful() && $data['status'] === 'OK') {
            // Extract email from SuperTokens response
            $email = $data['user']['emails'][0] ?? null; // Adjust this based on your response structure
        
            if ($email) {
                // Attempt to find the user in the database by email
                $user = \App\Models\User::where('email', $email)->first();

                if ($user) {
                    // Log the user in via Laravel Auth
                    Auth::guard('web')->login($user);
                    session()->start();

                    // Redirect to a protected route after login
   
                   return redirect()->intended(('dashboard')); 
                } else {
                    $this->error = 'User not found in the system.';
                }
            } else {
                $this->error = 'Email not found in SuperTokens response.';
            }
        } else {
            $this->error = $data['message'] ?? 'Invalid login credentials.';
        }

        // Log error for debugging


        // Return the error message to the view
      
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
