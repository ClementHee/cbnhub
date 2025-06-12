<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ProfileUpdateForm extends Component
{

    public $user;
    public $name;
    public $email;
    public $users;

    public function mount()
    {
        $this->user = $this->users;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }
    public function render()
    {
        return view('livewire.profile-update-form');
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
        ]);

        // Assuming you have a supertokens_user_id field
        $superTokensUserId = $this->user->supertokens_id;
  
        //$response = Http::withHeaders([
         //   'Content-Type' => 'application/json',
        //])->post('http://localhost:3001/update-email', [
          //  'userId' => $superTokensUserId,
            //'newEmail' => $this->email,
        //]);


        //if ($response->ok()) {
            // Success
            //$this->user->name = $this->name;
            //$this->user->email = $this->email;
            //$this->user->save();
    
        //} /else {
            // Handle error
        //}
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();
        session()->flash('message', 'Profile updated successfully.');
        return redirect()->route('profile');
    }
}
