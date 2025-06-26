<?php

namespace App\Http\Controllers;

use App\Models\Report;
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
        $src=Report::where('type', 'tpp')->first();
        // Logic for TPP dashboard
     
        return view('pages.report.report',compact('src'));
    }

    public function super5_dashboard()
    {
        $src=Report::where('type', 'super5')->first();
        // Logic for TPP dashboard
        return view('pages.report.report',compact('src'));
    }
    public function sba_dashboard()
    {
        $src=Report::where('type', 'sba')->first();
        // Logic for TPP dashboard
        return view('pages.report.report',compact('src'));
    }
    public function sol_dashboard()
    {
        $src=Report::where('type', 'sol')->first();
        // Logic for TPP dashboard
        return view('pages.report.report',compact('src'));
    }
    public function hdme_dashboard()
    {
        $src=Report::where('type', 'hdme')->first();
        // Logic for TPP dashboard
        return view('pages.report.report',compact('src'));
    }
    public function humanitarian_dashboard()
    {
        $src=Report::where('type', 'humanitarian')->first();
        // Logic for TPP dashboard
        return view('pages.report.report',compact('src'));
    }

    public function create(){
        // Logic to show the form for creating a new report
        return view('pages.report.createreport');
    }
}
