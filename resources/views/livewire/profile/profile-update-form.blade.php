<div>
    {{-- The whole world belongs to you. --}}
    <form wire:submit.prevent="updateProfile" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror       
                
                <label for="email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>       
                <input type="email" id="email" wire:model="email" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Profile</button>`
    </form>
</div>
