<?php

namespace App\Livewire\Journal;

use App\Models\Course;
use App\Models\Season;

use App\Models\Journal;
use Livewire\Component;
use function Livewire\store;
use Illuminate\Support\Facades\Auth;

class JournalForm extends Component
{

    use \Livewire\WithFileUploads;
    public $journal;
    public $seasons;
    public $name;
    public $church_name;
    public $season;
    public $bible_story;
    public $lesson;
    public $difficulty;
    public $interest;
    public $no_child;
    public $no_salvation;
    public $improvement;
    public $feedback;
    public $testimony;
    public $pictures;
    public $editMode = true;
    public $courses;



    public function mount($journal = null)
    {
        // Initialize journal with an empty model if not provided
        if ($journal) {
            $this->editMode = false; // Set edit mode if a journal is provided
            $this->journal = $journal;
            $this->name = $journal->name;
            $this->church_name = $journal->church_name;
            $this->season = $journal->season;
            $this->bible_story = $journal->bible_story;
            $this->lesson = $journal->lesson;
            $this->difficulty = $journal->difficulty;
            $this->interest = $journal->interest;
            $this->no_child = $journal->no_child;
            $this->no_salvation = $journal->no_salvation;
            $this->improvement = $journal->improvement;
            $this->feedback = $journal->feedback;
            $this->testimony = $journal->testimony;
           
            // Assuming pictures is a string of comma-separated file paths
            // Convert it to an array if needed
            if ($journal->pictures) {
                $this->pictures = explode(',', $journal->pictures);
            } else {
                $this->pictures = [];
            }
        } 

        // Load seasons from the database
        // This can be optimized by caching or using a service class
    
        $journal = $this->journal;
    // Initialize the seasons property if needed
        $this->courses = Course::all();
        $this->seasons = Season::all();

    }

    public function render()
    {
 
        return view('livewire.journal.journal-form');
    }

    public function submitJournal(){
        

        $pictures_path = [];
   
        $this->validate([
            'name' => 'required|string|max:255',
            'church_name' => 'required|string|max:255',
            'season' => 'required',
            'bible_story' => 'required|string|max:1000',
            'lesson' => 'required|string|max:1000',
            'difficulty' => 'required|integer|min:1|max:5',
            'interest' => 'required|integer|min:1|max:5',
            'no_child' => 'nullable|integer|min:0',
            'no_salvation' => 'nullable|integer|min:0',
            'improvement' => 'nullable|string|max:1000',
            'feedback' => 'nullable|string|max:1000',
            'testimony' => 'nullable|string|max:1000',
            // Assuming pictures is an array of file uploads
             // Adjust as needed
        ]);


        $saved = Journal::create([
            'name' => $this->name,
            'church_name' => $this->church_name,
            'user_id' => Auth::user()->id,
            'season' => $this->season,
            'bible_story' => $this->bible_story,
            'lesson' => $this->lesson,
            'difficulty' => $this->difficulty,
            'interest' => $this->interest,
            'no_child' => $this->no_child,
            'no_salvation' => $this->no_salvation,
            'improvement' => $this->improvement,
            'feedback' => $this->feedback,
            'testimony' => $this->testimony,
            
        ]);



        // Handle picture uploads
        if($saved && $this->pictures){
            foreach ($this->pictures as $picture) {
                $filename = $this->name . ' ' . $this->church_name . ' ' . $picture->getClientOriginalName(); // Get the original file name
         
                $filepath = $picture->storeAs('img', $filename, 'public'); // Store in public/journals
               
                
                array_push($pictures_path, $filepath);
            }
            $pictures_array = implode(",",$pictures_path);
  
            $saved->update([
                'pictures' => $pictures_array
            ]);
        }


        // Store the journal entry logic here
        // For example, you might save it to the database

        session()->flash('message', 'Journal entry submitted successfully.');
        
        // Reset form fields if needed
        $this->reset();
        
        return redirect()->route('journals'); // Adjust the route as needed

    
    }
}
