<div>
    <form wire:submit.prevent="createCohort" class="max-w-md mx-auto">
        <h2 class="text-lg font-semibold mb-4">{{$this->update==false? 'Create Cohort':'Update Cohort'}}</h2>

        @if ($this->update)
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model.defer="status" value="active" class="form-radio text-blue-600">
                        <span class="ml-2">Active</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model.defer="status" value="inactive" class="form-radio text-blue-600">
                        <span class="ml-2">Inactive</span>
                    </label>
                </div>
                @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
                
        @endif
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Cohort Name</label>
            <input type="text" id="name" wire:model.defer="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model.defer="description" class="mt-1 px-2 py-2 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        @if ($this->update)
         
            <button wire:click.prevent="updateCohort" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update Cohort</button>
        @else
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Create Cohort</button>
        @endif
 
    </form>
</div>
