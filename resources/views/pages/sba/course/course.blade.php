<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('course.create') }}">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                        Create Course
                    </button>
                </a>
                
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Season {{ $s }} Episodes
                    </h2>
                    @foreach ($courses as $index => $course)
                        @php
                            $index = $index + 1;
                        @endphp
                        <a href="{{ route('course.view', ['course' => $course->id]) }}" class="block mb-4">
                            <div class="mt-4 mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                                <div class="w-1/3">
                                    <img src="{{ asset('assets/img/thumbnails/' . $course->id . '.png') }}"
                                        alt="Course Image" class="h-full w-full object-cover shadow-md">
                                </div>

                                <div class="p-6 bg-white border-b border-gray-200">
                                    <h5 class="inline card-title">Name: {{ $course->name }}</h5>
                                    <p class="inline card-text"></p>
                                    <br />
                                    <h5 class="inline card-title">Description: {{ $course->description }}</h5>
                                    <p class="inline card-text"></p>
                                    <br />


                                    <h5 class="inline card-title">Season {{ $course->season_id }}</h5>


                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <script>
                    function toggleAccordion(contentId, iconId) {
                        const content = document.getElementById(contentId);
                        const icon = document.getElementById(iconId);

                        const minusSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                  <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
                </svg>
              `;

                        const plusSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                  <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                </svg>
              `;

                        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                            content.style.maxHeight = '0';
                            icon.innerHTML = plusSVG;
                        } else {
                            content.style.maxHeight = content.scrollHeight + 'px';
                            icon.innerHTML = minusSVG;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
