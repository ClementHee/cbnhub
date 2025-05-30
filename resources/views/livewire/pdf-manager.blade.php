<div class="p-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-2">
        @csrf
        <input type="file" wire:model="pdfFile" accept="application/pdf">
            @error('pdfFile') <p class="text-red-500">{{ $message }}</p> @enderror
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Upload PDF</button>
    </form>

    <h3 class="mt-6 font-bold">Uploaded PDFs:</h3>
    <ul class="list-disc ml-6 mt-2">
        @foreach ($pdfs as $pdf)
            <li wire:key="{{ $pdf }}" >
                {{ $pdf }}
                - <a href="{{ route('pdf.view', $pdf) }}" target="_blank" class="text-blue-500">View</a>
                - <a href="{{ route('pdf.download', $pdf) }}" class="text-green-500">Download</a>
                - <button wire:click="previewPDF('{{$pdf}}')" class="text-blue-500">Preview</button>
                @if ($this->preview == true && $this->currentPdf == $pdf)
                    <div class="mt-2">
                        <iframe src="{{ asset('storage/pdfs/' . $pdf) }}" width="100%" height="900"></iframe>
                    </div>
                    
                @endif
            </li>
        @endforeach
    </ul>
</div>
