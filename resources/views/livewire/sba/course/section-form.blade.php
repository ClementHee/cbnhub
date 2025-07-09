<div>
  
    {{-- The whole world belongs to you. --}}
    <form wire:submit.prevent="createSection" class="space-y-4">
    
        <div class="mb-4">
            <label for="lesson_title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
            <input type="text" id="lesson_title" wire:model="lesson_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></input>
        </div>
        <div class="mb-4">
            <label for="super_truth" class="block text-sm font-medium text-gray-700">Super Truth</label>
            <textarea id="super_truth" wire:model="super_truth" class="mt-1 px-2 pt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></textarea>
        </div>
        <div class="mb-4">
            <label for="super_verse" class="block text-sm font-medium text-gray-700">Super Verse</label>
            <textarea id="super_verse" wire:model="super_verse" class="mt-1 px-2 pt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></textarea>
        </div>
        <div class="mb-4">
            <label for="bible_story" class="block text-sm font-medium text-gray-700">Bible Lesson</label>
            <input type="text" id="bible_story" wire:model="bible_story" class="mt-1 px-2 pt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></input>
        </div>
        <div class="mb-4">
            <label for="superbook_video" class="block text-sm font-medium text-gray-700">Superbook Episode</label>
            <input type="text" id="superbook_video" wire:model="superbook_video" class="mt-1 px-2 pt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></input>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
            Create Section
        </button>
    </form>
</div>
