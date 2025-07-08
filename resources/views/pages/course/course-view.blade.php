<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <div class="w-1/3">
                    <img src="{{ asset('assets/img/thumbnails/' . $course->id . '.png') }}" alt="Course Image"
                        class="h-full w-full object-cover shadow-md">
                </div>
                <div class="p-6 bg-white border-b border-gray-200 w-2/3">
                    <div class="mb-2">
                        <span class="font-semibold">Name:</span>
                        <span>{{ $course->name }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-semibold">Description:</span>
                        <span>{{ $course->description }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-semibold">Order:</span>
                        <span>{{ $course->order }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-semibold">Season:</span>
                        <span>{{ $season->name }}</span>
                    </div>
                    @if (auth()->user()->hasRole('Super Admin'))
                        <a href="{{ route('course.assignCohort', $course->id) }}" class="my-4 inline-block">
                            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                                Assign Cohort
                            </button>
                        </a>

                        <a href="{{ route('course.edit', $course->id) }}" class="my-4 inline-block">
                            <button class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-blue-700">
                                Edit Cohort
                            </button>
                        </a>
                    @endif
                </div>
            </div>
            <div class="mt-8">
                <h1 class="text-xl font-bold mb-4">Manage Course Sections</h1>
                
                <div class="flex-auto p-4">
                    <livewire:course-section-table :courseId="$course->id"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
