<div>
    <form wire:submit.prevent="createCohort" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-4">Create Cohort</h2>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Cohort Name</label>
            <input type="text" id="name" wire:model.defer="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model.defer="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        @if ($this->update)
         
            <button wire:click.prevent="updateCohort" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Cohort</button>
        @else
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Create Cohort</button>
        @endif
 
    </form>
</div>
