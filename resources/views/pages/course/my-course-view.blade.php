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

                    <h3 class="inline card-title">Videos: </h3>
                    <a href="{{ route('view.video', ['episode' => $section->course_id, 'section' => $section->id]) }}"
                        class="inline card-text text-blue-500 hover:underline" target="_blank" onclick="openPopup(this.href); return false;">
                        View Videos
                    </a>
                    <div class="mt-6">
                        <h3> Teachers Guide</h3>
                        @foreach ($materials as $m)
                            @if ($m->course_section_id == $section->id)
                                @if ($m->upload_type == 'pdf' && $m->file_category == "Teacher's Guide")
                                    <h5 class="inline card-title">File Name: </h5>
                                    <p class="inline card-text">{{ $m->file_name }}</p>
                                    <a href="{{ asset('storage/pdfs/' . $m->filepath) }}" target="_blank"
                                        class="text-green-500">View PDF</a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="mt-6">

                        <h3> Activities</h3>


                        @foreach ($materials as $m)
                            @if ($m->course_section_id == $section->id)
                                @if ($m->upload_type == 'pdf' && $m->file_category == 'Activities')
                                    <h5 class="inline card-title">File Name: </h5>
                                    <p class="inline card-text">{{ $m->file_name }}</p>
                                    <a href="{{ asset('storage/pdfs/' . $m->filepath) }}" target="_blank"
                                        class="text-green-500">View PDF</a><br />
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
function openPopup(url) {
    window.open(url, 'popupWindow', 'width=900,height=600,scrollbars=yes,resizable=yes');
}
</script>
</x-app-layout>
