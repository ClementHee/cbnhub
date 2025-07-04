<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SectionMaterial extends Model
{
    use LogsActivity;
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()  // log all fillable / dirty attributes
            ->useLogName('materials_activity') // specify a custom log name
            ->setDescriptionForEvent(fn(string $eventName) => "Material has been {$eventName}");
    }

}


