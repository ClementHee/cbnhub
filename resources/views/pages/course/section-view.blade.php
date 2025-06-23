<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1>{{$courseSection->lesson_title}}</h1>
            </div>
            
            <livewire:course.material-upload :ep="$courseSection->id" />
        </div>
    </div>

    

        
</x-app-layout>