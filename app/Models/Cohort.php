<?php

namespace App\Models;

use App\Models\Course;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cohort extends Model
{
    use LogsActivity;
    
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cohort_users')
            
                    ->withTimestamps();
    }

    // Cohort has many courses
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'cohort_courses')
                
                    ->withTimestamps();
    }

    // Add user to cohort
    public function addUser(User $user, string $status = 'active'): void
    {
        
        $this->users()->attach($user->id);
    }

    public function removeUser(User $user, string $status = 'active'): void
    {
        
        $this->users()->detach($user->id);
    }

    // Enroll cohort in course
    public function enrollInCourse(Course $course): void
    {
        $this->courses()->attach($course->id);
    }

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()  // log all fillable / dirty attributes
            ->useLogName('cohort_activity') // specify a custom log name
            ->setDescriptionForEvent(fn(string $eventName) => "Cohort has been {$eventName}");
    }
  
}
