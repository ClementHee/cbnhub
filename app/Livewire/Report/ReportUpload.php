<?php

namespace App\Livewire\Report;

use App\Models\Report;
use Livewire\Component;

class ReportUpload extends Component
{

    public $title;
    public $description;
    public $type;
    public $src_url; 

    public function render()
    {
        return view('livewire.report.report-upload');
    }

    public function uploadReport()
    {
        // Logic to handle report upload
        // This could include validation, file storage, etc.
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:tpp,super5,sba,sol,hdme,humanitarian',
            'src_url' => 'required'// Adjust as needed
        ]);
        // Here you would typically save the report to the database
        // and handle the file upload logic.
        // For example:
        Report::create([
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,   
            'src_url' => $this->src_url,
        ]);
        // Reset the form fields after submission
        $this->reset(['title', 'description', 'type', 'src_url']);
        // Optionally, you can emit an event or redirect to a different page
        session()->flash('message', 'Report uploaded successfully!');
        return redirect()->route('dashboard'); // Adjust the route as needed
    }   
    
}
