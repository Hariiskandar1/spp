@extends('admin.layout.master')

@section('title')
    Nominal SPP
@stop

@section('content')

    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mr-2"><i class="fas fa-file-excel fa-sm text-white-50"></i> Import Excel</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fas fa-file-pdf fa-sm text-white-50"></i> Laporan PDF</a>
        <a href="{{route('spp.create')}}" class="btn btn-sm btn-primary shadow-sm mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
   
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
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
                            <td>{{ $row->nominal }}</td>
                            <td class="text-center">
                                <a href="{{ route('spp.edit',$row->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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

</div>
@stop