<div class="p-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form class="space-y-2">
        @csrf
        <select class="mb-4 p-2 border rounded w-full" wire:model.live="upload_type">
            <option value="">Upload File Type</option>
            <option value="pdf">New PDF</option>
            <option value="video">New Video</option>
        </select>

        @if ($upload_type === 'pdf')
            <label class="block font-medium text-gray-700 mb-2">Order:</label>
            <input type="text" wire:model="order" class="w-full p-2 border rounded mb-4">

            <label class="block font-medium text-gray-700 mb-2">File Name:</label>
            <input type="text" wire:model="file_name" class="w-full p-2 border rounded mb-4">

            <label class="block font-medium text-gray-700 mb-2">File Category:</label>
            <input type="text" wire:model="file_category" class="w-full p-2 border rounded mb-4">

            <div class="flex items-center space-x-4 mb-4">

                <label for="pdfFile"
                    class="flex items-center space-x-2 cursor-pointer bg-blue-500 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-700 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M4 12l8-8m0 0l8 8m-8-8v16" />
                    </svg>
                    <span>Choose PDF</span>
                </label>

                <input id="pdfFile" type="file" wire:model="pdfFile" accept="application/pdf" class="hidden" />

                <div class="text-md text-black-700">
                    @if ($pdfFile)
                        {{ $pdfFile->getClientOriginalName() }}
                        <button wire:click.prevent="submitPDF"
                            class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Upload PDF
                        </button>
                    @else
                        No file chosen
                    @endif
                </div>
                <div wire:loading wire:target="pdfFile">Uploading...</div>
            </div>
            
        @elseif ($upload_type === 'video')
            <div class="space-y-4">
                <div>
                    <label for="brightcove-url" class="block font-medium text-gray-700 mb-2">Brightcove URL</label>
                    <input type="text" id="brightcove-url" wire:model.defer="brightcove_url"
                        class="w-full p-2 border rounded" />
                    <label for="video_title" class="block font-medium text-gray-700 mb-2">Video Title</label>
                    <input type="text" id="video_title" wire:model="video_title" class="w-full p-2 border rounded" />

                    <label class="block font-medium text-gray-700 mb-2">Order:</label>
                    <input type="text" wire:model="order" class="w-full p-2 border rounded mb-4">


                    <label class="block font-medium text-gray-700 mb-2">File Category:</label>
                    <input type="text" wire:model="file_category" class="w-full p-2 border rounded mb-4">

                    <button type="button" wire:click="embedVideo"
                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Load Video</button>

                    @if ($brightcove_url)
                        <button type="button" wire:click="submitVideo"
                            class="mt-2 px-4 py-2 bg-green-600 text-white rounded">Save Video</button>
                    @endif
                </div>

                @if ($brightcove_url)
                    <div class="mt-6 aspect-video">
                        <iframe src="{{ $brightcove_url }}" allowfullscreen allow="encrypted-media"
                            class="w-full h-full border-0"></iframe>
                    </div>
                @endif
            </div>

        @endif


    </form>


    <h3 class="mt-6 font-bold">Uploaded PDFs:</h3>
    <ul class="list-decimal ml-6 mt-2 space-y-2">
        @foreach ($pdfs as $pdf)
            <li wire:key="{{ $pdf }}">
                <span>{{ $pdf->file_name }}</span>
                <span>
                    - <a href="{{ route('pdf.view', $pdf->filepath) }}" target="_blank" class="text-blue-500">View</a>
                    - <a href="{{ route('pdf.download', $pdf->filepath) }}" class="text-green-500">Download</a>
                    - <button wire:click="previewPDF('{{ $pdf->filepath }}')" class="text-blue-500">Preview</button>
                    - <button wire:click="deletePDF('{{ $pdf->id }}')" class="text-red-500">Delete</button>
                </span>
                @if ($this->preview && $this->currentPdf == $pdf->filepath)
                    <div class="mt-2">
                        <button wire:click="closePreview" class="text-red-500">Close Preview</button>
                        <iframe src="{{ asset('storage/pdfs/' . $pdf->filepath) }}" width="100%"
                            height="900"></iframe>

                    </div>
                @endif
            </li>
        @endforeach
    </ul>

    <h3 class="mt-6 font-bold">Uploaded Videos:</h3>
    <ul class="list-decimal ml-6 mt-2 space-y-2">
        @foreach ($videos as $video)
            <li wire:key="{{ $video }}">
                <span>{{ $video->video_title }}</span>
                <span>
                    - <button wire:click="previewVideos('{{ $video->brightcove_url }}')"
                        class="text-blue-500">Preview</button>

                    - <button wire:click="deleteVideo('{{ $video->id }}')" class="text-red-500">Delete</button>
                </span>
                @if ($this->previewVid && $this->currentVid == $video->brightcove_url)
                    <div class="mt-2">
                        <button wire:click="closePreview" class="text-red-500">Close Preview</button>

                        <div class="mt-6 aspect-video">
                            <iframe src="{{ $video->brightcove_url }}" allowfullscreen allow="encrypted-media"
                                class="w-full h-full border-0"></iframe>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>


</div>
