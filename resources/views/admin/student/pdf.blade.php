<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom styles for this template-->
    {{-- <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <!-- Custom styles for this page -->
    {{-- <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

</head>
<body>
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="2%">NO</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>SISA SPP</th>
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
                        {{$row->spps->nominal  - $total}}
                    @endif
                    
                </td>
            </tr>
            <?php $no++ ;?>
            @endforeach
        </tbody>
    </table>
</body>
</html>