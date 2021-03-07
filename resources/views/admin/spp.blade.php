@extends('admin.layout.master')

@section('title')
    Nominal SPP
@stop

@section('content')

    <!-- Begin Page Content -->
<div class="container-fluid">
    @if(\Session::has('success'))
    <div>{!!Session::get('success')!!}</div>
    @endif
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <button class="btn btn-sm btn-primary shadow-sm mr-2" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</button>
   
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data SPP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2%">NO</th>
                            <th width="20%">TAHUN AJARAN</th>
                            <th>NOMINAL</th>
                            <th width="10%" class="text-center">OPSI</th>
                        </tr>
                    </thead>                  
                    <tbody>
                    <?php $no=1;?>
                        @foreach($spp as $row)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td>{{ $row->tahun }}</td>
                            <td> Rp. {{ number_format($row->nominal, 0, ".", ".") }}</td>
                            <td class="text-center">
                                <a href="{{ route('spp.edit',$row->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('/destroy/'.$row->id) }}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
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
                <form method="POST" action="{{ route('spp.store') }}">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                        <label for="nama">Tahun Ajaran</label>
                        <input type="number" class="form-control @error('nama') is-invalid @enderror" id="tahun" name="tahun" placeholder="Masukan Jenjang Tahun">
                    
                        </div>
                        <div class="form-group">
                        <label for="nrp">Nominal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="rupiah2" name="nominal" placeholder="Masukan Nominal">
                          </div>
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
@stop
<script>
    $('#formSave').submit(function(e) {
           e.preventDefault();
           var request = new FormData(this);

           $('#formSave').removeClass('hide')

           $.ajax({
               url: "{{ route('spp.store') }}",
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