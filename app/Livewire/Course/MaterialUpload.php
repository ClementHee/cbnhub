<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SectionMaterial;
use Illuminate\Support\Facades\Storage;

class MaterialUpload extends Component
{
    use WithFileUploads;

    public $pdfFile;
    public $ep;
    public $currentPdf = null;
    public $preview = false;
       public $previewVid = false;
        public $currentVid ;
        public $prevUrl ;

    public $path;
    public string $upload_type = '';
    public $order;
    public $file_category;
    public $file_path;
    public $file_name;

    public $video_title;
    public $brightcove_url;
    public $course_section_id;
    public string $url = '';
    public ?string $iframeHtml = null;

    public $accountId,$playerId,$videoId;

     public function embedVideo()
    {
        $parsed = parse_url($this->brightcove_url);
        parse_str($parsed['query'] ?? '', $query);

        $this->videoId = $query['videoId'] ?? null;

        $pathParts = explode('/', trim($parsed['path'] ?? '', '/'));
        $this->accountId = $pathParts[0] ?? null;

        if (isset($pathParts[1])) {
            $this->playerId = explode('_', $pathParts[1])[0];
        }

        $this->dispatch('bcload', videoId: $this->videoId);
    }
    

    public function mount($ep)
    {
        $this->ep = $ep;

    }
    public function submitPDF()
    {  
        $this->validate([
            'pdfFile' => 'required|file|max:5120', // 5MB max
        ]);

       \App\Models\SectionMaterial::create([
            'course_section_id' => $this->ep,
            'upload_type' => 'pdf',
            'filepath' => $this->ep.$this->pdfFile->getClientOriginalName(),
            'file_name' => $this->file_name,
            'file_category' => $this->file_category,
            'order' => $this->order,
        ]);


        $this->pdfFile->storeAs('pdfs', $this->ep.$this->pdfFile->getClientOriginalName(), 'public');
        
        session()->flash('success', 'PDF uploaded successfully!');
        return redirect(request()->header('Referer'));
    }

    public function submitVideo()
    {

        $this->validate([
            'video_title' => 'required|string|max:255',
            'brightcove_url' => 'required|url',
        ]);

        \App\Models\SectionMaterial::create([
            'course_section_id' => $this->ep,
            'upload_type' => 'video',
            'filepath' => $this->brightcove_url,
            'brightcove_url' => $this->brightcove_url,
            'video_title' => $this->video_title,
            'order' => $this->order,
     
        ]);

        
        session()->flash('success', 'Video uploaded successfully!');
        return redirect(request()->header('Referer'));
    }   

    public function previewPDF($pdf){
        $this->preview = true;
        $this->currentPdf = $pdf;
        $this->path = storage_path("app/pdfs/{$pdf}");
 

    }

    public function previewVideos($url){

        $this->previewVid = true;
        $this->currentVid = $url;
        $this->prevUrl = $url;

    }

    public function render()
    {
        $videos= SectionMaterial::where('course_section_id', $this->ep)->where('upload_type','video')->orderBy('order')->get();
        $pdfs= SectionMaterial::where('course_section_id', $this->ep)->where('upload_type','pdf')->orderBy('order')->get();
        //$pdfs = collect(Storage::disk('public')->files('pdfs'))->map(fn($f) => basename($f));

        return view('livewire.course.material-upload',compact('pdfs','videos'));
    }

    public function deleteVideo($id)
    {
        $video = SectionMaterial::findOrFail($id);
        $video->delete();
        // Optionally, you can also delete the video file from storage if needed
        
        session()->flash('success', 'Video deleted successfully!');
    }

    public function deletePDF($id)
    {
        $pdf = SectionMaterial::findOrFail($id);
        $pdf->delete();
        // Optionally, you can also delete the PDF file from storage if needed
        Storage::disk('public')->delete('pdfs/' . $pdf->filepath);

        session()->flash('success', 'PDF deleted successfully!');
    }
    public function closePreview()
    {
        $this->preview = false;
        $this->previewVid = false;
        $this->currentPdf = null;
        $this->currentVid = null;
        $this->prevUrl = null;
        $this->iframeHtml = null;
        $this->videoId = null;
        $this->accountId = null;
        $this->playerId = null;     
        $this->url = '';
        $this->dispatch('bcload', videoId: null);
    }
}
