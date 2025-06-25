
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($videoUrl as $video)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ $video->video_title }}</h3>
                            <iframe width="100%" height="500" src="{{ $video->brightcove_url }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
