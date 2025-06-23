<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
    public function view($filename)
    {
     
        $path = storage_path("app/public/pdfs/{$filename}");


        abort_unless(file_exists($path), 404);

        return response()->file($path);
    }

    public function download($filename)
    {
        $path = storage_path("app/public/pdfs/{$filename}");

        abort_unless(file_exists($path), 404);

        return response()->download($path);
    }
}
