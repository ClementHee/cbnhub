<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'season_id',
        'order',
    ];
        
     public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'cohort_courses')
       
                    ->withTimestamps();
    }

    // Get all users enrolled in this course through cohorts
    public function enrolledUsers()
    {
        return User::whereHas('cohorts.courses', function ($query) {
            $query->where('courses.id', $this->id);
        });
    }



    // Check if course is accessible by user
    public function isAccessibleBy(User $user): bool
    {
        return $user->canAccessCourse($this);
    }

    // Enroll cohort in course
    public function enrollInCourse(Cohort $cohort): void
    {
        $this->cohorts()->attach($cohort->id);
    }
    
    public function removeCohort(Cohort $cohort): void
    {
        $this->cohorts()->detach($cohort->id);
    }

     // Get user's accessible courses
    public function getUserCourses(User $user)
    {
        return Course::whereHas('cohorts.users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->with(['cohorts'])->get();
    }

    
}
