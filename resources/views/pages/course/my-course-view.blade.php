<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            {{-- 
        This button is only visible to users with the 'Super Admin' role.
        It links to the route for assigning a cohort to the course.
      --}}
            <button class="mb-4 px-4 py-2">
                {{-- Button content here --}}
            </button>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
                <div class="w-1/3">
                    <img src="{{ asset('assets/img/thumbnails/' . $course->id . '.png') }}" alt="Course Image"
                        class="h-full w-full object-cover shadow-md">
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5 class="inline card-title">Name: </h5>
                    <p class="inline card-text">{{ $course->name }}</p>
                    <br />
                    <h5 class="inline card-title">Description: </h5>
                    <p class="inline card-text">{{ $course->description }}</p>
                    <br />
                    <h5 class="inline card-title">Order: </h5>
                    <p class="inline card-text">{{ $course->order }}</p>
                    <br />
                    <h5 class="inline card-title">Season: </h5>
                    <p class="inline card-text">{{ $season->name }}</p>
                </div>
            </div>
        </div>

        @foreach ($sections as $section)
            <div class="mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1>{{ $section->lesson_title }}</h1>

                    <p>{{ $section->description }}</p>
                    @foreach ($materials as $m)
                        @if ($m->course_section_id == $section->id)
                            <br />
                            @if ($m->upload_type == 'video')
                                <h5 class="inline card-title">Video Title: </h5>
                                <h6 class="inline card-text">{{ $m->video_title }}</h6>
                                <iframe src="{{ $m->filepath }}" width="70%" height="600" frameborder="0"
                                    allowfullscreen></iframe>
                            @elseif ($m->upload_type == 'pdf')
                                <h5 class="inline card-title">File Name: </h5>
                                <p class="inline card-text">{{ $m->file_name }}</p>
                                <a href="{{ asset('storage/pdfs/' . $m->filepath) }}" target="_blank"
                                    class="text-green-500">View PDF</a>
                            @endif
                            <br />
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
