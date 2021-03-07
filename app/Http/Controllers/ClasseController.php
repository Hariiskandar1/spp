<?php

namespace App\Http\Controllers;

use App\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classe::get();
        return view('admin.class', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classe = new Classe;
        $classe->class = $request->kelas;
        $classe->kompetensi_keahlian = $request->kompetensi;
        $classe->save();

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
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        return view('admin.class.edit', compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class' => 'required|max:255',
            'kompetensi_keahlian' => 'required',
        ]);
        Classe::whereId($id)->update($validatedData);

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
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classe::destroy($id);

        return back();
    }
}
