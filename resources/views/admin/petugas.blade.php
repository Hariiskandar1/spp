@extends('admin.layout.master')

@section('title')
    Data Petugas
@stop

@section('content')

    <!-- Begin Page Content -->
<div class="container-fluid">

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
                            <th width="20%">NAMA PETUGAS</th>
                            <th>USERNAME</th>
                            <th width="10%" class="text-center">OPSI</th>
                        </tr>
                    </thead>                  
                    <tbody>
                    <?php $no=1;?>
                        @foreach($petugas as $row)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td class="text-center">
                                <a href="{{ url('/destroy/'.$row->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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
            <h4 class="mt-3 text-center">Tambah Petugas</h4>
                <form method="POST" action="{{ route('officer.store') }}">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="name" required name="name" placeholder="Masukan Nama">          
                        </div>
                        <div class="form-group">
                        <label for="nrp">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                        </div>
                        <div class="form-group">
                        <label for="nrp">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
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