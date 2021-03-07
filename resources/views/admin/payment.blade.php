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
                            <th width="10%">NIS</th>
                            <th width="15%">NAMA</th>
                            <th width="2%">KELAS</th>
                            <th>KETERANGAN</th>
                            <th width="20%">JUMLAH BAYAR</th>
                            <th width="10%" class="text-center">OPSI</th>
                        </tr>
                    </thead>                  
                    <tbody>
                    <?php $no=1;?>
                        @foreach($payment as $row)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td>{{ $row->student->nis }}</td>
                            <td>{{ $row->student->name }}</td>
                            <td>{{ $row->student->classes->class }} {{ $row->student->classes->kompetensi_keahlian }}</td>
                            <td>{{ $row->deskription }}</td>
                            <td>Rp. {{ number_format($row->jumlah_bayar, 0, ".", ".") }}</td>
                            <td class="text-center">
                            <a href="{{ url('/destroyPayment/'.$row->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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