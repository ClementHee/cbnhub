<?php

namespace App\Livewire\SBA\Cohort;

use App\Models\User;
use Livewire\Component;

class AssignUserToCohort extends Component
{
    public $test;
    public $cohort;
    public $users; // Array to hold users not in the cohort
    public string $search = '';
    public array $selectedUsers = []; // Array to hold selected user IDs
    public $assignedUsers = []; // Array to hold assigned user IDs
    public $assignedUsersNames = []; // Array to hold assigned user names
    public function mount($cohort = null)
    {
        if ($cohort) {
            // Reset search when mounting with a cohort
            $this->cohort = $cohort;
            $this->updatedSearch();
        }
    }

    public function render()
    {


        // Fetch users based on search criteria if search is not empty
        if ($this->search) {
            $this->selectedUsers = $this->cohort->users->pluck('id')->toArray();
            $this->users = User::whereNotIn('id', $this->selectedUsers)
                ->where('name', 'like', '%' . $this->search . '%')
                // Exclude already selected users
                ->get();
        } else {

            // If no search, fetch all users not in the cohort
            $this->users = User::whereNotIn('id', $this->selectedUsers)->get(); // Get users already in the cohort
        }

        return view('livewire.s-b-a.cohort.assign-user-to-cohort');
    }

    public function assignUsersToCohort()
    {

        $this->validate([
            'selectedUsers' => 'required|array|min:1', // Ensure at least one user is selected
        ]);


        foreach ($this->selectedUsers as $userId) {

            $user = User::find($userId);
            if ($user) {

                // Check if the user is already in the cohort
                if ($this->cohort->users->contains($user)) {

                    continue; // Skip if user is already in the cohort
                }

                $this->cohort->addUser($user); // Add user to the cohort
            }
        }

        $this->reset('selectedUsers'); // Clear selected users after assignment
        $this->updatedSearch();
        $this->users = User::whereNotIn('id', $this->selectedUsers)->get();

        session()->flash('message', 'Users assigned to cohort successfully.');


        // Redirect or perform any other action
    }

    public function removeUserFromCohort()
    {

        foreach ($this->assignedUsersNames  as $userId) {
            $user = User::find($userId);
            $this->cohort->removeUser($user);
        }

        $this->reset('assignedUsersNames'); // Clear assigned users after removal
        $this->updatedSearch();
        $this->users = User::whereNotIn('id', $this->selectedUsers)->get(); // Update users not in the cohort   
    }

    public function updatedSearch()
    {
        // Reset selected users when search changes
        $this->assignedUsers = $this->cohort->users()->select('users.id', 'users.name')->pluck('name', 'id')->toArray(); // Update assigned users after removing
        $this->selectedUsers = $this->cohort->users()->select('users.id')->pluck('id')->toArray();
    }
}
