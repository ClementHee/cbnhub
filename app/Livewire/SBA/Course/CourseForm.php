<?php

namespace App\Livewire\Sba\Course;

use App\Models\Course;
use Livewire\Component;

class CourseForm extends Component
{
    public $course;
    public $seasons;
    public $name;
    public $description;
    public $season_id;
    public $order;
    public $courseid;

    public $selectedSeason;
    public $update=false;
    
    public function mount($course = null)
    {
        // Initialize course with an empty model if not provided

  
        $this->seasons = \App\Models\Season::all();
        if ($this->course) {
            $this->update = true;
            $this->name = $this->course->name;
            $this->description = $this->course->description;
            $this->season_id = $this->course->season_id;
            $this->order = $this->course->order;
        } else {
            $this->course = new \App\Models\Course();
        }
              $this->course = $course;
    }

    public function render()
    {
        return view('livewire.sba.course.course-form');
    }
    public function createCourse()
    {
    
        // Create the course
        Course::create([
            'id' => $this->courseid,
            'name' => $this->name,
            'description' => $this->description,
            'order' => $this->order,
            'season_id' => $this->season_id,
        ]);

        // Reset form fields
        $this->reset('course');

        session()->flash('message', 'Course created successfully.');

        return redirect()->route('courses', ['season' => $this->season_id]);
    }

    public function updateCourse()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'season_id' => 'required|exists:seasons,id',
        ]);

        // Update the course
        $this->course->update([
            'name' => $this->name,
            'description' => $this->description,
            'order' => $this->order,
            'season_id' => $this->season_id,
            
        ]);

        session()->flash('message', 'Course updated successfully.');

        return redirect()->route('courses',['season' => $this->season_id]);
    }
}
