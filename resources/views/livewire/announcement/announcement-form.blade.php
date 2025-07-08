<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form>
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model="title"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content" wire:model="content"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                rows="4" required></textarea>
        </div>
        <div class="mb-4">
            <select id="addressed_to" wire:model="addressed_to"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <button wire:click.prevent='saveDraft'
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                type="submit">Save as Draft</button>


            <button wire:click.prevent='publishAnnouncement'
                class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                type="button" wire:click="publishAnnouncement">Publish</button>

        </div>
    </form>
</div>


