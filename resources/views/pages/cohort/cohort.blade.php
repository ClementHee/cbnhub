<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cohorts') }}
        </h2>
    </x-slot>


<div class="container">
    <h1 class="mb-4">Cohorts</h1>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        <a href="{{ route('cohort.create') }}" class="text-white hover:text-white">Create Cohort</a>
    </button>
<div class="relative flex flex-col w-full h-full  text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">

    <table class="w-full text-left table-auto min-w-max text-slate-800 px-4 py-4">
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
                <tr wire:key ="{{ $cohort->id }}" class="border-b border-slate-200 hover:bg-slate-100">
                    <td>{{ $cohort->name }}</td>
                    <td>{{ $cohort->description }}</td>
                    <td class="text-center">
                        @if ($cohort->status == 'active')
                            <span class="text-green-500 font-semibold">Active</span>
                        @elseif ($cohort->status == 'inactive')
                            <span class="text-red-500 font-semibold">Inactive</span>
                        @endif
                    </td>
                    <td class="flex justify-center items-center space-x-2">
                        <button class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                            <a href="{{ route('cohort.edit', $cohort->id) }}">Edit</a>
                        </button>
                        
                        <form action="{{ route('cohort.destroy', $cohort->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="!bg-red-500 hover:!bg-red-700 text-white font-semibold py-2 px-4 rounded">Delete</button>
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
    </table>
    </div>
    
</div>
</x-app-layout>