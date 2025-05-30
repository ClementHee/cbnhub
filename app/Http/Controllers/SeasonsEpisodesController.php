<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class SeasonsEpisodesController extends Controller
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
    public function show(Season $seasons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $seasons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $seasons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $seasons)
    {
        //
    }
}
