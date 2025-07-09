<div>

    <form wire:submit.prevent="createCourse" >
        @if ($this->update)
            <h2 class="text-lg font-semibold mb-4">Update Course</h2>
        @else
            <h2 class="text-lg font-semibold mb-4">Create Course</h2>
        @endif
        <div class="mb-4">
            <label for="courseid" class="block text-sm font-medium text-gray-700">Course ID</label>
            <input type="text" id="courseid" wire:model="courseid" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" id="name" wire:model="name" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
            <input type="text" id="order" wire:model="order" class="py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="season_id" class="block text-sm font-medium text-gray-700">Season</label>
            
            <select wire:model.defer="season_id" id="season" class="mt-1 block py-3 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Season</option>
                @foreach ($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                    
                @endforeach
            </select> 
        </div>

        @if ($this->update)
         
            <button wire:click.prevent="updateCourse" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Course</button>
        @else
            <button wire:click.prevent="createCourse" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Create Course</button>
        @endif
 
    </form>
</div>

</div>
