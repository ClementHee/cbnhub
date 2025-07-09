<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cohorts = Cohort::all();
        return view('pages.sba.cohort.cohort', compact('cohorts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sba.cohort.cohort-management');
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
    public function show(Cohort $cohort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cohort $cohort)
    {
        $cohort = Cohort::findOrFail($cohort->id);
       
        return view('pages.sba.cohort.cohort-management', compact('cohort'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cohort $cohort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cohort = Cohort::findOrFail($id);

        $cohort->delete();

        // Optionally, redirect or return a response
        return redirect()->route('cohorts')->with('success', 'Cohort deleted successfully.');
    }

    public function assignUser(Cohort $cohort)
    {
        $cohort = Cohort::findOrFail($cohort->id);
       
        return view('pages.sba.cohort.cohort-assign-user', compact('cohort'));
    }

}
