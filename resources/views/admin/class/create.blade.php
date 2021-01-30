@extends('admin.layout.master')

@section('title')
    Tambah Kelas
@stop

@section('content')

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 bg-white">
    <h1 class="mt-3 text-center">Form Tambah Kelas</h1>

        <form method="POST" action="{{ route('class.store') }}">
            @csrf
            <div class="form-group">
            <label for="nama">Kelas</label>
            <input type="number" class="form-control @error('nama') is-invalid @enderror" id="kelas" name="kelas" placeholder="Masukan Jenjang Kelas">
            @error('kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
            <label for="nrp">Kompetensi Keahlian</label>
            <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="kompetensi" name="kompetensi" placeholder="Masukan kompetensi Keahlian">
            @error('kompetensi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="d-sm-flex justify-content-between mb-5">
                <a href="{{ route('class.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

</div>
<!-- End of Main Content -->
@stop
