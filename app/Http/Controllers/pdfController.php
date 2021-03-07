<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Student;

class pdfController extends Controller
{
    public function pdf()
    {
        $student = Student::all();
        $pdf = PDF::loadview('pdf')->setPaper('A4','potrait');
        return $pdf->stream();
    }
    
}
