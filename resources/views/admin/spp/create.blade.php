@extends('admin.layout.master')

@section('title')
    Tambah Nominal SPP
@stop

@section('content')

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 bg-white">
    <h1 class="mt-3 text-center">Form Tambah Kelas</h1>

        <form method="POST" action="{{ route('spp.store') }}">
            @csrf
            <div class="form-group">
            <label for="nama">Tahun Ajaran</label>
            <input type="number" class="form-control @error('nama') is-invalid @enderror" id="tahun" name="tahun" placeholder="Masukan Jenjang Tahun">
          
            </div>
            <div class="form-group">
            <label for="nrp">Nominal</label>
            <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nominal" name="nominal" placeholder="Masukan Nominal">

            </div>
            <div class="d-sm-flex justify-content-between mb-5">
                <a href="{{ route('spp.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

</div>
<!-- End of Main Content -->
@stop
