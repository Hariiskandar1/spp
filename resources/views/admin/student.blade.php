@extends('admin.layout.master')

@section('title')
Data Siswa
@stop

@section('content')   
@if(\Session::has('success'))
<div>{!!Session::get('success')!!}</div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">

    <div id="formSave"></div>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="{{ url('student-pdf-belum') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mr-2"><i class="fas fa-file-excel fa-sm text-white-50"></i> Siswa Belum Bayar</a>
        <a href="{{ url('student-pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Laporan PDF</a>
        <button class="btn btn-sm btn-primary shadow-sm mr-2" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</button>
   
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2%">NO</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>SISA SPP</th>
                            <th width="2%" class="text-center">BAYAR</th>
                            <th width="10%" class="text-center">OPSI</th>
                        </tr>
                    </thead>                  
                    <tbody>
                        <?php $no=1;?>
                        @foreach($student as $row)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td>{{ $row->nisn }}</td>
                            <td>{{ $row->nis }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->classes->class }} {{ $row->classes->kompetensi_keahlian }}</td>
                            <td>
                            
                                    <?php $total=0;?>
                                    @foreach($payment as $pay )
                                        @if ($pay->student_id == $row->id)
                                        
                                            <?php $total += $pay->jumlah_bayar ;?>
                                        @endif
                                    
                                    @endforeach
                                @if ($row->spps->nominal - $total <= 0)
                                    <a class="btn btn-sm btn-success">Lunas</a>
                                @else
                                    Rp. {{number_format($row->spps->nominal  - $total, 0, ".", ".") }}
                                @endif
                                
                            </td>
                            <td class="text-center">
                            <a href="{{ route('student.show', $row->id) }}" class="btn btn-sm btn-success"><i class="fas fa-money-bill-alt"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('student.edit', $row->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/deleteStudent/'.$row->id) }}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $no++ ;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


{{-- modal --}}
<div class="modal hide fade in" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <h3 class="mt-3 text-center">Tambah Kelas</h3>
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                            <label for="nama">NISN</label>
                            <input type="number" class="form-control " id="nisn" name="nisn" placeholder="Masukan NISN">
                        </div>

                        <div class="form-group">
                            <label for="nama">NIS</label>
                            <input type="number" class="form-control " id="nis" name="nis" placeholder="Masukan NIS">
                        </div>

                        <div class="form-group">
                            <label for="nama">NAMA</label>
                            <input type="text" class="form-control " id="name" name="name" placeholder="Masukan Nama">
                        </div>

                        <div class="form-group">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" class="form-control " id="tgl_lahir" name="tgl_lahir">
                        </div>

                        <div class="form-group">
                            <label for="nama">KELAS</label>
                            <select class="form-control" id="class" name="class">
                                @foreach ($class as $classes)
                                    <option value="{{ $classes->id }}">{{ $classes->class }} {{ $classes->kompetensi_keahlian }}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">ALAMAT</label>
                            <input type="text" class="form-control " id="alamat" name="alamat" placeholder="Masukan Alamat">
                        </div>

                        <div class="form-group">
                            <label for="nama">NO_TELPON</label>
                            <input type="number" class="form-control " id="no_telpon" name="no_telpon" placeholder="Masukan Nomor Telpon">
                        </div>

                        <div class="form-group">
                            <label for="nama">TAHUN SPP</label>
                            <select class="form-control" id="spp" name="spp">
                                @foreach ($spp as $spps)
                                    <option value="{{ $spps->id }}">{{ $spps->tahun }} {{ $spps->nominal }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>  
      </div>
    </div>
  </div>

</div>
<!-- End of Main Content -->
@stop
<script>
    $('#formSave').submit(function(e) {
           e.preventDefault();
           var request = new FormData(this);

           $('#formSave').removeClass('hide')

           $.ajax({
               url: "{{ route('student.store') }}",
               method: "POST",
               data: request,
               contentType: false,
               cache: false,
               processData: false,
               success: function(data) {
                   if (data == "sukses") {
                       $('#closeModalTambah').click();
                       $('#formSave')[0].reset();
                       swal({
                           type: 'success',
                           title: 'Berhasil!',
                           text: 'Data Telah Tersimpan!'
                       });
                       loadDataTable();
                   }
               }
           });
       });
</script>