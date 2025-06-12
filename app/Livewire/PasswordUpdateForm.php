<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordUpdateForm extends Component
{
    public $user;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;
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
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($this->currentPassword, $this->user->password)) {
            $this->passwordUpdateError = true;
            $this->passwordUpdateErrorMessage = 'Current password is incorrect.';
            return;
        }

        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();

        $this->passwordUpdated = true;
        $this->passwordUpdateMessage = 'Password updated successfully.';
    }
    public function resetForm()
    {
        $this->currentPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';
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
