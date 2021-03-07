@extends('petugas.layoutPetugas.master')

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
                                    Rp. {{ number_format($row->spps->nominal  - $total, 0, ".", ".")}}
                                @endif
                                
                            </td>
                            <td class="text-center">
                            <a href="{{ route('petugasStudent.show', $row->id) }}" class="btn btn-sm btn-success"><i class="fas fa-money-bill-alt"></i></a>
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