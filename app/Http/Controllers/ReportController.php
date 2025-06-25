<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Logic to fetch and display reports
        return view('pages.report.index');
    }

    public function tpp_dashboard()
    {
        // Logic for TPP dashboard
        return view('pages.report.tppreport');
    }
}
