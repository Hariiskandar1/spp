@extends('admin.layout.master')

@section('title')
Data Siswa
@stop

@section('content')   
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mr-2"><i class="fas fa-file-excel fa-sm text-white-50"></i> Import Excel</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Laporan PDF</a>
        <a href="#" class="btn btn-sm btn-primary shadow-sm mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
   
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                        @foreach($student as $row)
                        <tr>
                            <td>{{ $row->nisn }}</td>
                            <td>{{ $row->nis }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->classe->class }}</td>
                            <td></td>
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-success"><i class="fas fa-money-bill-alt"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@stop