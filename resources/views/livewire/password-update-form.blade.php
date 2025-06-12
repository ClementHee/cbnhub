<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="updatePassword" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                <input type="password" id="current_password" wire:model="current_password" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label for="new_password" class="block text-sm font-medium text-gray-700 mt-4">New Password</label>
                <input type="password" id="new_password" wire:model="new_password" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mt-4">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Password</button>
    </form>
</div>
