@extends('siswa.layout.master')

@section('title')
    Siswa
@stop

@section('content')
 <div class="container-fluid">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data History Pembayaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2%">NO</th>
                            <th>Tanggal Pembayaran</th>
                            <th>KETERANGAN</th>
                            <th>BAYAR</th>                          
                        </tr>
                    </thead>
                    
                                     
                    <tbody>
                        
                    <?php $no=1;?>
                    <?php $total=0;?>
                        @foreach($payment as $row )
                            @if ($row->student_id == $student->id)
                                <tr>
                                    <td class="text-center">{{ $no }}</td>
                                    <td class="text-center"> {{ $row->created_at }} </td>
                                    <td>{{ $row->deskription }}</td>
                                    <td class="text-right">Rp. {{  number_format($row->jumlah_bayar, 0, ".", ".") }}</td>
                                </tr>
                                <?php $no++ ;?>
                                <?php $total += $row->jumlah_bayar ;?>
                            @endif                        
                        @endforeach
                    </tbody>
                    <tbody>
                      
                        <tr>
                            <td colspan="3">JUMLAH YANG HARUS DI BAYAR</td>
                            <td class="text-right">Rp. {{ number_format($student->spps->nominal, 0, ".", ".") }}</td>
                        </tr>
                       
                        
                    </tbody>
                    <tbody>
                      
                        <tr>
                            <td colspan="3">JUMLAH YANG SUDAH DI BAYAR</td>
                            <td class="text-right">Rp. {{ number_format($total , 0, ".", ".") }}</td>
                        </tr>
                       
                        
                    </tbody>  
                    <tfoot>
                        <th colspan="3">JUMLAH YANG BELUM DI BAYAR</th>
                        <th class="text-right">Rp. {{ number_format($student->spps->nominal - $total , 0, ".", ".") }}</th>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@stop