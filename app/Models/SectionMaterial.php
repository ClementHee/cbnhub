<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionMaterial extends Model
{
    //
    protected $fillable = [
        'course_section_id',
        
        'upload_type',
        'brightcove_url',
        'video_title',

        'order',
        'filepath',
        'file_name',
        'file_category'

    ];



    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }

}


