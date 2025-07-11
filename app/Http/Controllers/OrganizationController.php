<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         return view('pages.cbnhub.organization.org');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.cbnhub.organization.org_form');
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
    public function show(Organization $organization)
    {
        //
   
        return view('pages.cbnhub.organization.org_form', [
            'organization' => $organization,
            'mode' => 'view_only'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
        return view('pages.cbnhub.organization.org_form', [
            'organization' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }

    public function assignProductFacil(Organization $organization)
    {
        // This method is used to assign a product facilitator to an organization
        return view('pages.cbnhub.organization.org_management', [
            'organization' => $organization
        ]);
    }
}
