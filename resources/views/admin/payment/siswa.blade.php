@extends('admin.layout.master')

@section('title')
    Bayar SPP
@stop

@section('content')
@if(\Session::has('success'))
<div>{!!Session::get('success')!!}</div>
@endif
{{-- container fluid --}}
<div class="container-fluid">
    <div id="payment"></div>
    {{-- blade --}}
        <div class="row">
            <div class="col-md-5">
            <form method="POST" id="payment" action="{{ url('/storePayment') }}">
                    @csrf
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pembayaran SPP</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <label for="nama">NOMINAL</label>
                                    <input type="number" hidden class="form-control mb-2" id="student_id" name="student_id" value="{{ $student->id }}">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                          </div>
                                          <input type="text" class="form-control text-right" id="rupiah2" name="nominal" placeholder="Masukan Nominal">
                                        </div>
                                    <label for="nama">KETERANGAN</label>
                                    <textarea name="deskription" id="deskription" class="form-control"></textarea>
                                    
                                </div>
                                <div class="d-sm-flex justify-content-between mb-1 mt-3">
                                    <a href="{{ route('student.index') }}" class="btn btn-secondary">Batal</a>
                                    <?php $no=1;?>
                                    <?php $total=0;?>
                                    @foreach($payment as $row )
                                        @if ($row->student_id == $student->id)
                                            <?php $no++ ;?>
                                            <?php $total += $row->jumlah_bayar ;?>
                                        @endif
                                    
                                    @endforeach
                                    @if ($student->spps->nominal - $total <= 0)
                                    <a class="btn btn-danger">Lunas</a>
                                    @else 
            
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- end --}}
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                            </div>
                            <div class="card-body">
                                
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NISN</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->nisn}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NIS</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="nis" name="nis" value="{{$student->nis}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NAMA</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">KELAS</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->classes->class}} {{$student->classes->kompetensi_keahlian }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">ALAMAT</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->alamat}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">TANGGAL LAHIR</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->tgl_lahir}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NO.TLP</label>
                                        <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->no_telpon}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">ANGKATAN</label>
                                        <div class="col-sm-8">
                                            <input type="text" hidden readonly class="form-control-plaintext" id="id_spp" name="id_spp" value="{{$student->spps->id}}" >
                                            <input type="text" readonly class="form-control-plaintext" id="" value="{{$student->spps->tahun}}" >
                                        </div>
                                    </div>
                                
            
                            </div>
                        </div>
                        {{-- end --}}
                </form>

            </div>
            <div class="col-md-7">
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
                                        <th width="10%" class="text-center">OPSI</th>
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
                                                <td class="text-center">
                                                    <a href="{{url('/destroyPayment/'.$row->id)}}"  class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="text-right">Rp. {{ number_format($row->jumlah_bayar, 0, ".", ".")  }}</td>
                                            </tr>
                                            <?php $no++ ;?>
                                            <?php $total += $row->jumlah_bayar ;?>
                                        @endif
                                    
                                    @endforeach
                                </tbody>
                                <tbody>
                                  
                                    <tr>
                                        <td colspan="4">JUMLAH YANG HARUS DI BAYAR</td>
                                        <td class="text-right">Rp. {{ number_format($student->spps->nominal, 0, ".", ".")}}</td>
                                    </tr>
                                   
                                    
                                </tbody>
                                <tbody>
                                  
                                    <tr>
                                        <td colspan="4">JUMLAH YANG SUDAH DI BAYAR</td>
                                        <td class="text-right">Rp. {{ number_format($total, 0, ".", ".")}}</td>
                                    </tr>
                                   
                                    
                                </tbody>  
                                <tfoot>
                                    <th colspan="4">JUMLAH YANG BELUM DI BAYAR</th>
                                    <th class="text-right">Rp. {{ number_format($student->spps->nominal - $total, 0, ".", ".") }}</th>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>
        </div>
    {{-- endblade --}}
</div>
{{-- end container fluid --}}
</div>
<!-- End of Main Content -->
@stop