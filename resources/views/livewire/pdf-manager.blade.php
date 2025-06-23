<div class="p-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-2">
        @csrf
        <div class="flex items-center space-x-4 mb-4">
            <!-- Button -->
            <label for="pdfFile"
                class="flex items-center space-x-2 cursor-pointer bg-blue-500 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M4 12l8-8m0 0l8 8m-8-8v16" />
                </svg>
                <span>Choose PDF</span>
            </label>

            <!-- Actual File Input (hidden) -->
            <input id="pdfFile" type="file" wire:model="pdfFile" accept="application/pdf" class="hidden" />

            <!-- File Name or Placeholder -->
            <div class="text-md text-black-700">
                @if ($pdfFile)
                    {{ $pdfFile->getClientOriginalName() }}
                    <button class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Upload PDF
                    </button>
                @else
                    No file chosen
                @endif
            </div>
            <div wire:loading wire:target="pdfFile">Uploading...</div>
        </div>
    </form>

    {{--<h3 class="mt-6 font-bold">Uploaded PDFs:</h3>
    <ul class="list-decimal ml-6 mt-2 space-y-2">
        @foreach ($pdfs as $pdf)
            <li wire:key="{{ $pdf }}">
                <span>{{ $pdf }}</span>
                <span>
                    - <a href="{{ route('pdf.view', $pdf) }}" target="_blank" class="text-blue-500">View</a>
                    - <a href="{{ route('pdf.download', $pdf) }}" class="text-green-500">Download</a>
                    - <button wire:click="previewPDF('{{ $pdf }}')" class="text-blue-500">Preview</button>
                </span>
                @if ($this->preview && $this->currentPdf == $pdf)
                    <div class="mt-2">
                        <iframe src="{{ asset('storage/pdfs/' . $pdf) }}" width="100%" height="900"></iframe>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>--}}
</div>
