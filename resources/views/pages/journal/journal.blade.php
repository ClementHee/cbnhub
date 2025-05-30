<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" wire:click={{ route('journal.create') }}>
                            <a href="{{ route('journal.create') }}" class="text-white hover:text-white">
                                Create New Journal Entry
                            </a>
                        </button>
                    <table class="w-full text-left table-auto min-w-max text-slate-800 px-4 py-4">
                        <thead>
                            <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                                <th class="py-4">Name</th>
                                <th class="py-4">Church Name</th>
                                <th class="py-4">Submitted At</th>
                                <th class="py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($journals as $journal)
                                <tr>
                                    <td class="">{{ $journal->name }}</td>
                                    <td class="">{{ $journal->church_name }}</td>
                                    <td class="">{{ $journal->created_at }}</td>
                                    <td class="">
                                        <a href="{{ route('journal.show', $journal->id) }}" class="text-blue-500 hover:underline">View</a>
                                    
                                        <form action="{{ route('journal.destroy', $journal->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>