<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent="uploadReport" class="space-y-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Upload Report</h2>
            <div class="mb-4">
                <label for ="title" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">Report Title</label>
                <input type='text' wire:model='title' placeholder="Report Title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for ="description" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">Report Description</label>
                <input type='text' wire:model='description' placeholder="Report Description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label for="type" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">Report Category</label>
                <select id="type" wire:model="type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Category</option>
                    <option value="tpp">The Parenting Project</option>
                    <option value="super5">Super 5</option>
                    <option value="sba">SuperBook Academy</option>
                    <option value="sol">School Of Life</option>
                    <option value="hdme">HDME</option>
                    <option value="humanitarian">Humanitarian</option>
                </select>
            </div>
            <div class="mb-4">
                <label for ="src_url" class="block font-medium text-gray-700 dark:text-gray-300 mb-2">Report URL</label>
                <input type='text' wire:model='src_url' placeholder="Report URL" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Upload</button>
        </div>
</div>
