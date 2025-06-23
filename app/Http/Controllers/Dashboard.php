<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method can be used to fetch and display data for the dashboard.
        $userCount = User::count();
        $cohortCount = Cohort::count();
        $cohortNotAssigned = Cohort::whereDoesntHave('courses')->get();
      

        return view('dashboard', [
            'userCount' => $userCount,
            'cohortCount' => $cohortCount,
            'cohortNotAssigned' => $cohortNotAssigned,
        ]   );
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
