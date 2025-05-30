<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cohort extends Model
{
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

   
  
}
