<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\CourseTracking;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::all();
        $courses = Course::all();
       
        return view('pages.course.course',compact('seasons','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        $course = Course::findOrFail($course->id);

        $season = Season::findOrFail($course->season_id);



        return view('pages.course.course-view', compact('course','season'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        $course = Course::findOrFail($course->id);
        $seasons = Season::all();
        
        return view('pages.course.course-management', compact('course', 'seasons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function assignCohort(Course $course)
    {

        $course = Course::findOrFail($course->id);

        return view('pages.course.cohort-assign-course',compact('course'));
    }

    public function seeCourses(Request $request){
        $user = Auth::user()->id;
        $seasons = Season::all();
        $courses = Course::whereHas('cohorts.users', function ($query) use ($user) {
            $query->where('users.id', $user);
        })->with(['cohorts'])->get();

        return view('pages.course.my-courses', compact('courses','seasons'));
    }

    public function seeMyCourses(Course $mycourses){

        
        $season = Season::findOrFail($mycourses->season_id);
   
        $course = Course::findOrFail($mycourses->id);

        CourseTracking::create([
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
        ]);
       
        return view('pages.course.my-course-view', compact('course','season'));
    }



}
