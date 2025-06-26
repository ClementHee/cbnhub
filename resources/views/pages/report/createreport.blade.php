<x-app-layout>
    @hasrole('Super Admin')
        <div>
            <div class="px-6 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                    style="transform: scale(0.8); transform-origin: top left; width: 125%; height: 125%;">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-bold mb-4">Create Report</h1>
                        <p class="text-gray-600">This page allows you to create a new report.</p>
                    </div>
                    <livewire:report.report-upload />
                </div>
            </div>
        @endhasrole
</x-app-layout>
