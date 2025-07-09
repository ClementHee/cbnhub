<?php

namespace App\Livewire\Sba\Roles;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesManagement extends Component
{
   #[Layout('layouts.app')]
    public $userId;
    public $user;
    public $roleId;
    public $roleName;
    public $allPermissions;
    public $selectedUserId;
    public $selectedRoles;
    public $selectedPermissions = [];

    public function mount($userId)
    {
        
        $this->user = User::find($userId) ;
        $this->selectedPermissions = $this->user->getAllPermissions()->pluck('name')->toArray();
        $this->selectedRoles = $this->user->getRoleNames()->toArray();
    }
   
    public function render()
    {
        $allPermissions  = Permission::all();

        $roles = Role::all();
        $user = User::find($this->user->id);  

        return view('livewire.sba.roles.roles-management',[
            'permissions' => $allPermissions, 'roles' => $roles, 'user' => $user
        ]);
    }

    public function assignRoles()
    {
        $user = User::find($this->user->id);
       
        $user->syncPermissions($this->selectedPermissions);
        $user->syncRoles($this->selectedRoles);

        return redirect()->route('users');
    }
    
}
