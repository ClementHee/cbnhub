<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $roles = [];
    public $selectedRoles = [];
    
    public function mount()
    {
        // Initialize roles if needed
        $this->roles = \Spatie\Permission\Models\Role::all();
    }
    public function render()
    {
        return view('livewire.user.user-form');
    }

    public function saveUser(){

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',

        ]);

        $user = \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        if (!empty($this->selectedRoles)) {
            $user->syncRoles($this->selectedRoles); 
        }

        $this->dispatch('swal:created',[
            'message' => 'User created successfully!',
            'redirectUrl' => route('users')
        ]);
      
    }
}
