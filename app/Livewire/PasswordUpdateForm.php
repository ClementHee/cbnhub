<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordUpdateForm extends Component
{
    public $user;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $users;
    public $passwordUpdated = false;
    public $passwordUpdateError = false;
    public $passwordUpdateMessage = '';
    public $passwordUpdateErrorMessage = '';
    public function mount()
    {
        
        $this->user = $this->users;
    }
    public function updatePassword()
    {
             
        $this->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
   
        if (!Hash::check($this->current_password, $this->user->password)) {
     
            $this->passwordUpdateError = true;
            $this->passwordUpdateErrorMessage = 'Current password is incorrect.';
            return;
        }

        $this->user->password = Hash::make($this->new_password);

        $this->user->save();
        $this->resetForm();
        $this->passwordUpdated = true;
        $this->passwordUpdateMessage = 'Password updated successfully.';
    }
    public function resetForm()
    {
        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
        $this->passwordUpdated = false;
        $this->passwordUpdateError = false;
        $this->passwordUpdateMessage = '';
        $this->passwordUpdateErrorMessage = '';
    }

    public function render()
    {
        return view('livewire.password-update-form');
    }
}
