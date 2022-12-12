<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use PDF;


class TestPDF extends Controller
{
    public function generate(){
        $data = Listing::get();
        return view('pdf.demo', compact ('data'));
    }
}
