<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Http;

class RegisterForm extends Component
{public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $confirm_password = '';
    public string $error = '';
    public string $success = '';
    #[Layout('layouts.guest')]
    public function register()
    {
        // Validation
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
       
    
        // Call to SuperTokens API for signup
        $response = Http::withOptions([
                'verify' => false
            ])->post(config('supertokens.api_url') . '/auth/signup', [
            'formFields' => [
                ['id' => 'username', 'value' => $this->username],
                ['id' => 'email', 'value' => $this->email],
                ['id' => 'password', 'value' => $this->password],
            ],
        ]);
        

     
    
     
        // Check if response is not null and is successful
        if ($response->successful()) {
            $data = $response->json();

            // Ensure response data contains expected values
            if (isset($data['status']) && $data['status'] === 'OK') {
                // Set the session cookies returned by SuperTokens (from headers)
                foreach ($response->headers() as $name => $values) {
                    foreach ($values as $value) {
                        if (str_starts_with(strtolower($name), 'set-cookie')) {
                            header("$name: $value", false);
                        }
                    }
                }
                $user = User::where('email', $this->email)->first();
                if ($user == null){
                    $newUser = User::create([
                        'email' => $this->email,
                        'name' => $this->username,
                        'password' => bcrypt($this->password),
                        
                    ]);

                    
                    
                }
                else{
                    $this->error = $data['message'] ?? 'User Exists.';
                }
                // Redirect to dashboard or desired page
                return redirect()->route('dashboard');
            }

            // Handle errors (if any)
            $this->error = $data['message'] ??$data['formFields'][0]['error'];
        } else {
            // Handle failed response if not successful
            $this->error = 'Unable to communicate with SuperTokens API.';
        }
    }
    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
