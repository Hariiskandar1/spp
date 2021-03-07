@extends('admin.layout.master')

@section('title')
Dashboard
@stop

@section('content')
@if(\Session::has('success'))
<div>{!!Session::get('success')!!}</div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Content Row -->
<div class="row">
    <?php $totalpay=0;?>
    @foreach($payment as $payments )
            <?php $totalpay += $payments->jumlah_bayar ;?>
    @endforeach
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            JUMLAH UANG SUDAH MASUK</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($totalpay, 0, ".", ".") }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            JUMLAH SISWA</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$studentC}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            JUMLAH KELAS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$class}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            JUMLAH PETUGAS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$officer}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9">
          <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data SPP</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="2%">Tanggal</th>
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
                                <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->student->nis }}</td>
                                <td>{{ $row->student->name }}</td>
                                <td>{{ $row->student->classes->class }} {{ $row->student->classes->kompetensi_keahlian }}</td>
                                <td>{{ $row->deskription }}</td>
                                <td>{{ $row->jumlah_bayar }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/destroyPayment/'.$row->id) }}" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
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
    <div class="col-md-3">       
   <!-- Donut Chart -->
    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie">
                <canvas id="myPieChart"></canvas>
            </div>
            <hr>
            Styling for the donut chart can be found in the
            <code>/js/demo/chart-pie-demo.js</code> file.
        </div>
</div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@stop
