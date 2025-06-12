<?php
namespace App\Livewire\Auth;

use Log;
use App\Models\User;
use Livewire\Component;

use App\Models\UsersTracking;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Login extends Component
{    protected $redirectTo = '/dashboard';
    public string $email = '';
    public string $password = '';
    public string $error = '';
    public  $bypass = true; // Set to true to bypass CSRF token check for SuperTokens

    #[Layout('layouts.guest')]


    public function login()
    {
        // Validate user input
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Call SuperTokens API for authentication
        //$response = Http::withOptions([
        //    'verify' => false // Disable SSL verification (use with caution)
        //])->post(config('supertokens.api_url') . '/auth/signin', [
        //    'formFields' => [
        //        ['id' => 'email', 'value' => $this->email],
        //        ['id' => 'password', 'value' => $this->password],
        //    ],
        //]);

        // Check if response is successful
        //$data = $response->json();
        if ($this->bypass) {
            // Extract email from SuperTokens response
            //$email = $data['user']['emails'][0] ?? null; // Adjust this based on your response structure
        
            if ($this->email) {
           
                // Attempt to find the user in the database by email
                $user = User::where('email', $this->email)->first();
    
             
                
                if ($user) {

          
                    // Log the user in via Laravel Auth
                    Auth::guard('web')->login($user);
                    session()->start();


                    UsersTracking::create([
                    'user_id'  => $user->id ,
                    'ip_address' => Request::ip(),
                    'user_agent'=> Request::header('user-agent')

                ]);
                if (!$user->getRoleNames()->toArray()){
                    if($this->email = "clement@superbookmalaysia.com"){
                        $user->syncRoles('Super Admin');
                    }
                }
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
