<?php

namespace App\Livewire\Course;

use App\Models\Cohort;
use App\Models\Course;
use Livewire\Component;

class AssignCohortToCourse extends Component
{
    public $course;

    public $cohort;
    public $cohorts; // Array to hold cohorts not assigned to the course
    public $selectedCohort = [];
    public $assignedCohort = [];
    public $update = false;
    public $courseId;
    public string $search = '';
    public $assignedCohortNames = []; // Array to hold assigned cohort names

    public function mount($course = null)
    {
        $this->course = $course;


        if ($this->course) {
       
            $this->courseId = $this->course->id;
            $this->updatedSelectionData(); // Update assigned cohorts after removing
        } else {
            $this->courseId = null;
        }
    }
    public function render()
    {
       
        if ($this->search) {
            $this->selectedCohort = $this->course->cohorts->pluck('id')->toArray();
            $this->cohorts = Cohort::whereNotIn('id', $this->selectedCohort)
            ->where('name', 'like', '%' . $this->search . '%')
                 // Exclude already selected users
                ->get();

        } else {

            // If no search, fetch all users not in the cohort
            $this->cohorts = Cohort::whereNotIn('id', $this->selectedCohort)->get(); // Get users already in the cohort
        }
     
        return view('livewire.course.assign-cohort-to-course');
    }

    public function assignCohortsToCourse()
    {
       
        $this->validate([
            'selectedCohort' => 'required|array|min:1', // Ensure at least one user is selected
        ]);



        foreach ($this->selectedCohort as $cohortId) {
      
            $cohort = Cohort::find($cohortId);
            
            if ($cohort) {
                
                // Check if the cohort is already assigned to the course
                if ($this->course->cohorts->contains($cohort)) {
                // Check if the user is already in the cohort
                    
                    
                    continue; // Skip if user is already in the cohort
                }
              
                $this->course->enrollInCourse($cohort); // Add user to the cohort
            }
        }


        $this->reset('selectedCohort');// Clear selected users after assignment

        $this->updatedSelectionData(); // Update assigned cohorts after removing
        $this->cohorts = Cohort::whereNotIn('id', $this->selectedCohort)->get();

        session()->flash('message', 'Users assigned to cohort successfully.');
       
    }

    public function removeCohortFromCourses()
    {
         foreach ($this->assignedCohortNames  as $cohortId) {
            $cohort = Cohort::find($cohortId);
            $this->course->removeCohort($cohort); 
        }

        $this->reset('assignedCohortNames'); // Clear selected cohorts after removal
        $this->updatedSelectionData(); // Update assigned cohorts after removing
        $this->cohorts = Cohort::whereNotIn('id', $this->selectedCohort)->get(); // Update cohorts not assigned to the course
        session()->flash('message', 'Cohorts removed from course successfully.');

    
    }

    public function updatedSelectionData(){
        $this->assignedCohort = $this->course->cohorts()->select('cohorts.id', 'cohorts.name')->pluck('name','id')->toArray(); // Update assigned cohorts after removing
        $this->selectedCohort = $this->course->cohorts()->select('cohorts.id')->pluck('id')->toArray();
    }
}
