<?php

namespace App\Http\Controllers;

use PDF;
use App\Student;
use App\Classe;
use App\Spp;
use App\Payment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        $payment = Payment::get();
        $spp = Spp::get();
        $class = Classe::get();
        return view('admin.student')
        ->with(compact('student'))
        ->with(compact('payment'))
        ->with(compact('class'))
        ->with(compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
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
        $student = new Student;
        $student->nisn                = $request->nisn;
        $student->nis                 = $request->nis;
        $student->name                = $request->name;
        $student->tgl_lahir           = $request->tgl_lahir;
        $student->class_id            = $request->class;
        $student->alamat              = $request->alamat;
        $student->no_telpon           = $request->no_telpon;
        $student->id_spp              = $request->spp;
        $student->save();

        return back()->with(
            ['success' => "<script>
              Swal.fire(
            'Berhasil',
            'Pembayaran Telah Disimpan',
            'success'
              )</script>"]
          );
    }

    public function storePayment(Request $request)
    {
        $payment = new Payment;
        $payment->student_id                 = $request->student_id;
        $payment->id_spp                     = $request->id_spp;
        $payment->deskription                = $request->deskription;
        $payment->jumlah_bayar               = str_replace(".", "", $request->nominal);
        $payment->save();

        return back()->with(
            ['success' => "<script>
              Swal.fire(
            'Berhasil',
            'Data Berhasi Disimpan',
            'success'
              )</script>"]
          );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $spp = Spp::get();
        $payment = Payment::get();
        $class = Classe::get();
        return view('admin.payment.siswa')
        ->with(compact('student'))
        ->with(compact('payment'))
        ->with(compact('class'))
        ->with(compact('spp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $spp = Spp::get();
        $class = Classe::get();
        return view('admin.student.edit')
        ->with(compact('student'))
        ->with(compact('class'))
        ->with(compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nisn'          => 'required',
            'nis'           => 'required',
            'name'          => 'required',
            'class_id'         => 'required',
            'alamat'        => 'required',
            'no_telpon'     => 'required',
            'id_spp'         => 'required',
        ]);
        Student::whereId($id)->update($validatedData);

        // Spp::update($sttr);

        return back()->with(
            ['success' => "<script>
              Swal.fire(
            'Berhasil',
            'Data Berhasi Diubah',
            'success'
              )</script>"]
          );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);

        return back();
    }
    public function pdf()
    {
        $student = Student::all();
        $payment = Payment::all();
        $pdf = PDF::loadview('admin.student.pdf', compact('student','payment') )->setPaper('A4','potrait');
        return $pdf->stream();
    }
    public function pdfbelum()
    {
        $student = Student::all();
        $payment = Payment::all();
        $pdf = PDF::loadview('admin.student.pdfbelum', compact('student','payment') )->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
