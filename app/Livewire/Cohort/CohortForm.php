<?php

namespace App\Livewire\Cohort;

use App\Models\Cohort;
use Livewire\Component;

class CohortForm extends Component
{
    public $name;
    public $description;
    public $cohort; // For editing existing cohort
    public $status = 'active'; // Default status
    public $update = false; // Flag to determine if we are updating an existing cohort

    public function mount($cohort = null)
    {
        if ($cohort) {
            $this->cohort = $cohort;
            $this->name = $cohort->name;
            $this->description = $cohort->description;
            $this->status = $cohort->status;
            $this->update = true; // Set update flag if we are editing an existing cohort
        }
    }

    public function render()
    {

        return view('livewire.cohort.cohort-form');
    }

    public function createCohort()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
           
        ]);

        // Create the cohort
        Cohort::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        // Reset form fields
        $this->reset(['name', 'description', 'status']);

        // Optionally, emit an event or redirect
        session()->flash('message', 'Cohort created successfully.');

        return redirect()->route('cohorts');
    }

    public function updateCohort()
    {
    
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Update the cohort
        $this->cohort->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        // Reset form fields
        $this->reset(['name', 'description', 'status']);

        // Optionally, emit an event or redirect
        session()->flash('message', 'Cohort updated successfully.');

        return redirect()->route('cohorts');
    }

    
}
