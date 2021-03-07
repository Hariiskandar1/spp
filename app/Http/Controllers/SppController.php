<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();
        return view('admin.spp', compact('spp'));
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
        $spp = new Spp;
        $spp->tahun         = $request->tahun;
        $spp->nominal       = str_replace(".", "", $request->nominal);
        $spp->save();

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
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        return view('admin.spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);
        
        Spp::whereId($id)->update($validatedData);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($spp)
    {
        Spp::destroy($spp);

        return back();

    }
}
