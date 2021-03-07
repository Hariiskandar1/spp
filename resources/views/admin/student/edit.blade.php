    @extends('admin.layout.master')

    @section('title')
        Edit Data Siswa
    @stop

    @section('content')
    @if(\Session::has('success'))
    <div>{!!Session::get('success')!!}</div>
    @endif
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 bg-white">
        <h1 class="mt-3 text-center">Edit Data Siswa</h1>

        <form method="POST" action="{{ url('/studentUpdate/' .$student->id) }}">
                @csrf
                
                <div class="container">
                    <div class="form-group">
                        <label for="nama">NISN</label>
                        <input type="number" class="form-control " id="nisn" name="nisn" value="{{ $student->nisn }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">NIS</label>
                        <input type="number" class="form-control " id="nis" name="nis" value="{{ $student->nis }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{ $student->name }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">KELAS</label>
                        <select class="form-control" id="class_id" name="class_id">
                                <option value="{{$student->classes->id}}">{{$student->classes->class}} {{$student->classes->kompetensi_keahlian}}</option>
                            @foreach ($class as $classes)
                                <option value="{{ $classes->id }}">{{ $classes->class }} {{ $classes->kompetensi_keahlian }}</option>
                            @endforeach                                
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">ALAMAT</label>
                        <input type="text" class="form-control " id="alamat" name="alamat" value="{{ $student->alamat }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">NO_TELPON</label>
                        <input type="number" class="form-control " id="no_telpon" name="no_telpon" value="{{ $student->no_telpon }}">
                    </div>

                    <div class="form-group">
                        <label for="nama">TAHUN SPP</label>
                        <select class="form-control" id="id_spp" name="id_spp">
                            <option value="{{$student->spps->id}}">{{$student->spps->tahun}} {{$student->spps->nominal}}</option>
                            @foreach ($spp as $spps)
                                <option value="{{ $spps->id }}">{{ $spps->tahun }} {{ $spps->nominal }}</option>
                            @endforeach                                
                        </select>
                    </div>
                </div>



                <div class="d-sm-flex justify-content-between mb-5">
                    <a href="{{ route('student.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
                
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

    </div>
    <!-- End of Main Content -->
    @stop
