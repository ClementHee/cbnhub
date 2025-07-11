<div class=" mx-auto p-6 rounded-md space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800 mb-1">Roles Management for {{ $user->name }}</h1>
        <p class="text-gray-600 text-sm">Manage user roles and permissions.</p>
    </div>

    <form wire:submit.prevent="assignRoles" class="space-y-6">
        <div>
            <label for="roles" class="block text-sm font-medium text-gray-700 mb-1">Roles</label>
            <select wire:model="selectedRoles" id="roles" multiple
                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 h-32">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">Hold Ctrl (Windows) or Command (Mac) to select multiple roles.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                @foreach ($permissions as $permission)
                    <label for="permission-{{ $permission->id }}" class="flex items-center space-x-2">
                        <input type="checkbox" wire:model="selectedPermissions"
                               value="{{ $permission->name }}"
                               id="permission-{{ $permission->id }}"
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-800">{{ ucfirst($permission->name) }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded shadow">
                Update Roles
            </button>
        </div>
    </form>
</div>
