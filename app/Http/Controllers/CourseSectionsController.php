<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(CourseSection $courseSections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseSection $courseSection)
    {
        return view('pages.sba.course.section-view', [
            'courseSection' => $courseSection,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseSection $courseSections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSection $courseSections)
    {
 
        $courseSections->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function createSection($courseId)
    {
        return view('pages.sba.course.section-create', [
            'courseId' => $courseId,
        ]);
    }
}
