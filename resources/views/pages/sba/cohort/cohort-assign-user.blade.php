<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign User To Cohort') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
  
                    @livewire('sba.cohort.assign-user-to-cohort', ['cohort' => $cohort ?? null])
                </div>
            </div>
        </div>
</x-app-layout>