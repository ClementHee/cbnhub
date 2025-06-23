<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PdfManager extends Component
{
    use WithFileUploads;

    public $pdfFile;
    public $ep;
    public $currentPdf = null;
    public $preview = false;
    public $path;

    public function mount()
    {
        $ep = $this->ep;
    }
    public function submit()
    {
        
        $this->validate([
            'pdfFile' => 'required|file|max:5120', // 5MB max
        ]);



        $this->pdfFile->storeAs('pdfs', 'ep'.$this->ep.$this->pdfFile->getClientOriginalName(), 'public');

        $this->reset('pdfFile');
        session()->flash('success', 'PDF uploaded successfully!');
    }

    public function render()
    {
        $pdfs = collect(Storage::disk('public')->files('pdfs'))->map(fn($f) => basename($f));
        return view('livewire.pdf-manager', compact('pdfs'));
    }

    public function previewPDF($pdf){
        $this->preview = true;
        $this->currentPdf = $pdf;
        $this->path = storage_path("app/pdfs/{$pdf}");
    
    }
}
