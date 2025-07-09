<?php

namespace App\Livewire\SBA\Announcement;

use App\Models\User;
use Livewire\Component;
use App\Models\Announcement;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AnnouncementForm extends Component
{
    public $title;
    public $content;
    public $author;
    public $status = 'draft'; // default status
    public $product;
    public $addressed_to;

    public function render()
    {

        return view('livewire.sba.announcement.announcement-form', [
            'roles' => Role::all(),
        ]);
    }

    public function saveDraft()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'product' => 'nullable|exists:products,id',
            'addressed_to' => 'nullable|string|max:255',
        ]);

        

        // Create the announcement
        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'author' => Auth::user()->name,
            'status' => 'draft',
            'product' => $this->product,
            'addressed_to' => $this->addressed_to,
        ]);

        $this->reset([
            'title',
            'content',
            'author',
            'status',
            'product',
            'addressed_to',
        ]);

        session()->flash('message', 'Announcement created successfully.');
        return redirect()->route('announcements');
    }

    public function publishAnnouncement()
    {

        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'product' => 'nullable|exists:products,id',
            'addressed_to' => 'nullable|string|max:255',
        ]);

        // Create the announcement
        // Debugging line to check if this method is being called
        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'author' => Auth::user()->name,
            'status' => 'published',
            'product' => $this->product,
            'addressed_to' => $this->addresed_to,
        ]);

        $this->reset([
            'title',
            'content',
            'author',
            'status',
            'product',
            'addressed_to',
        ]);

        session()->flash('message', 'Announcement published successfully.');
        return redirect()->route('announcements');
    }
}
