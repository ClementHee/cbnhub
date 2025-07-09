<?php

namespace App\Livewire\Sba\Course;

use Livewire\Component;
use App\Models\CourseSection;

class SectionForm extends Component
{
    public $courseId;
    public $lesson_title;
    public $super_truth;
    public $super_verse;
    public $bible_story;
    public $superbook_video;

    public $isEditMode = false;

    public function mount(){
        $courseId = $this->courseId;
    }
    public function render()
    {
       
        return view('livewire.sba.course.section-form',[
            'courseId' => $this->courseId,
            'isEditMode' => $this->isEditMode,
        ]);
    }

    public function createSection()
    {
        $this->validate([
            'lesson_title' => 'required|string|max:255',
            'super_truth' => 'required|string|max:255',
            'super_verse' => 'required|string|max:255',
            'bible_story' => 'nullable|string',
            'superbook_video' => 'nullable|string',
        ]);

        // Logic to create a new section
        $section = new CourseSection();
        $section->course_id = $this->courseId;
        $section->lesson_title = $this->lesson_title;
        $section->super_truth = $this->super_truth;     
        $section->super_verse = $this->super_verse;
        $section->bible_story = $this->bible_story;
        $section->superbook_video = $this->superbook_video;
        $section->save();

        $course = $this->courseId;
        $this->redirect(route('course.view', compact('course')));

    }
}
