<div>
    <h1>Roles Management for {{$user->name}}</h1>
    <p>Manage user roles and permissions.</p>
    
    <form wire:submit.prevent="assignRoles">
        <div>
            <label for="user">Role:</label>
            <select wire:model="selectedRoles" id="roles">
                <option value="">Select a role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <div>   
                <label>Permissions:</label>
                @foreach ($permissions as $permission)
                    <div>
                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}" id="permission-{{ $permission->id }}">
                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Roles</button>
    </form>
</div>
