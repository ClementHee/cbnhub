<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    //
    
    protected $fillable = [
        'course_id',
        'lesson_title',
        'super_truth',
        'super_verse',
        'bible_story',
        'superbook_video',
        
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function sectionMaterials()
    {
        return $this->hasMany(SectionMaterial::class)->orderBy('order', 'asc');
    }
}
