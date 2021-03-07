<?php

namespace App\Http\Controllers;

use App\Student;
use App\Payment;
use Illuminate\Http\Request;

class AuthSiswaController extends Controller
{
    public function index()
    {
        $data = session('siswa');
        $payment = Payment::all();
        $student = Student::find($data);
        return view('siswa.siswa')
        ->with(compact('student'))
        ->with(compact('payment'));
    }
    public function login(Request $request)
    {
        
        $data = Student::where('nis', $request->nis)->first();  
        if($data)
        {
            if($request->tgl_lahir == $data->tgl_lahir)
            {
                session(['siswa' => $data->id]);
                return redirect('siswa');
            }
            return redirect('/');
        }
        return redirect('/');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
   
}
