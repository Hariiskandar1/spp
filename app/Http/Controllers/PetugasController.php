<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classe;
use App\Spp;
use App\Payment;
use App\User;
use App\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id     = session('petugas');
        $dataauth = Officer::find($id);
        $student = Student::all();
        $payment = Payment::get();
        $spp = Spp::get();
        $class = Classe::get();
        return view('petugas.student')
        ->with(compact('student'))
        ->with(compact('payment'))
        ->with(compact('class'))
        ->with(compact('dataauth'))
        ->with(compact('spp'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storePetugas(Request $request)
    {
        $payment = new Payment;
        $payment->id_petugas                 = $request->id_petugas;
        $payment->student_id                 = $request->student_id;
        $payment->id_spp                     = $request->id_spp;
        $payment->deskription                = $request->deskription;
        $payment->jumlah_bayar               = str_replace(".", "", $request->nominal);
        $payment->save();

        return back()->with(
            ['success' => "<script>
              Swal.fire(
            'Berhasil',
            'Pembayaran Telah Disimpan',
            'success'
              )</script>"]
          );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($petugas)
    {
        $id     = session('petugas');
        $dataauth = Officer::find($id);
        $spp = Spp::get();
        $payment = Payment::get();
        $class = Classe::get();
        $student = Student::find($petugas);
        return view('petugas.bayar')
        ->with(compact('student'))
        ->with(compact('payment'))
        ->with(compact('class'))
        ->with(compact('dataauth'))
        ->with(compact('spp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
