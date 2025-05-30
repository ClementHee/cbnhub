<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
  
            @foreach ($seasons as $index => $season)

              <div wire:key="{{ $season->name }}" class="border-b border-slate-200">
                <button onclick="toggleAccordion('content-{{ $season->id }}', 'icon-{{ $season->id }}')" class="w-full flex justify-between items-center py-5 text-slate-800">
                  <span>{{ $season->name }}</span>
                  <span id="icon-{{ $season->id }}" class="text-slate-800 transition-transform duration-300">
                    <!-- Plus icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                      <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                  </span>
                </button>

                <div id="content-{{ $season->id }}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                  @foreach ($courses->where('season_id', $season->id) as $e_index => $course)
                    <div wire:key="{{ $course->name }}" class="pb-5 text-sm text-slate-500">
   
                      <a href="{{ route('mycourses.show', $course->id) }}" class="hover:underline">
                                    {{ $course->name }}: {{ $course->description }}
                                </a>
                    </div>
                  @endforeach
                </div>
              </div>
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