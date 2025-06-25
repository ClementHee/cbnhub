<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cohorts') }}
        </h2>
    </x-slot>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center mb-4">
                        <h1>Cohorts</h1>

                        <a href="{{ route('cohort.create') }}">
                            <button class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Cohort
                            </button>
                        </a>
                    </div>

                    <div
                       >
                        <livewire:cohort-table />
                        {{-- <table class="w-full text-left table-auto min-w-max text-slate-800 px-4 py-4">
        <thead>
            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                <th class="p-4 text-center">Cohort Name</th>
                
                <th class="p-4 text-center">Description</th>
                <th class="p-4 text-center">Status</th>
                <th class="p-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cohorts as $cohort)
                <tr wire:key ="{{ $cohort->id }}" class="border-b border-slate-200 ">
                    <td>{{ $cohort->name }}</td>
                    <td>{{ $cohort->description }}</td>
                    <td class="text-center">
                        @if ($cohort->status == 'active')
                            <span class="text-green-500 font-semibold">Active</span>
                        @elseif ($cohort->status == 'inactive')
                            <span class="text-red-500 font-semibold">Inactive</span>
                        @endif
                    </td>
                    <td class="flex justify-center items-center space-x-2 py-2">
                        <button class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                            <a href="{{ route('cohort.edit', $cohort->id) }}">Edit</a>
                        </button>
                        
                        <form action="{{ route('cohort.destroy', $cohort->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Delete</button>
                        </form>

                        <button class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                            <a href="{{ route('cohort.assignUser', $cohort->id) }}">Assign User</a>
                        </button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No cohorts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
