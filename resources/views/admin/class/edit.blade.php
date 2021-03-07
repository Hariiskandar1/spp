@extends('admin.layout.master')

@section('title')
    Edit Kelas
@stop

@section('content')
@if(\Session::has('success'))
<div>{!!Session::get('success')!!}</div>
@endif
<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4 bg-white">
    <h1 class="mt-3 text-center">Edit Kelas</h1>

        <form method="POST" action="{{ url('/classUpdate/' .$classe->id) }}">
            @csrf
            <div class="form-group">
            <label for="nama">Kelas</label>
            <input type="number" class="form-control" id="class" name="class" value="{{ $classe->class }}" >

            </div>
            <div class="form-group">
            <label for="nrp">Kompetensi Keahlian</label>
            <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{ $classe->kompetensi_keahlian }}">
  
            </div>
            <div class="d-sm-flex justify-content-between mb-5">
                <a href="{{ route('classe.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

</div>
<!-- End of Main Content -->
@stop
