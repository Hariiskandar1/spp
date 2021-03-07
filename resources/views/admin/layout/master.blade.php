<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- Sweet --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
</head>

<body id="page-top">

    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('assets/admin/img/smk1.png')}}" width="60" height="60" alt="">
                </div>
                <div class="sidebar-brand-text mx-1">Admin <sup>SPP</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

             <!-- Nav Item - Spp -->
             <li class="nav-item {{ (request()->is('spp')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('spp.index')}}">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Nominal Spp</span></a>
            </li>

            <!-- Nav Item - Kelas -->
            <li class="nav-item {{ (request()->is('classe')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('classe.index')}}">
                    <i class="fas fa-fw fa-university"></i>
                    <span>Data Kelas</span></a>
            </li>

            <!-- Nav Item - Siswa -->
            <li class="nav-item {{ (request()->is('student')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('student.index')}}">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Siswa</span></a>
            </li>

             <!-- Nav Item - pembayaran -->
             <li class="nav-item {{ (request()->is('payment')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('payment.index')}}">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Pembayaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

             <!-- Nav Item - Users -->
             <li class="nav-item {{ (request()->is('dataAdmin')) ? 'active' : '' }}">
             <a class="nav-link" href="{{  route('dataAdmin.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Admin</span></a>
            </li>
            <!-- Nav Item - Users -->
            <li class="nav-item {{ (request()->is('officer')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('officer.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Petugas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <i class="fas fa-user-shield bold text-800"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('adminLogout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            @yield('content')

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/chart.js/chart.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!--DateRangePicker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  

    {{-- sweeet alert --}}
    <script src="{{ asset('assets/sweetalert2.all.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/datatables-demo.js') }}"></script>
    {{-- js rupiah --}}
    <script src="{{ asset('assets/admin/main.js') }}"></script>
    <script>
         $('.btn-delete').on('click', function (e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
            title: 'Yakin Mau Hapus Data?',
            text: "Data Akan Terhapus Secara Permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Delete'
            }).then((result) => {
            if (result.isConfirmed) {
               document.location.href = href;
            }
            })
        })

//         //fungsi untuk filtering data berdasarkan tanggal 
//     var start_date;
//     var end_date;
//     var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
//        var dateStart = parseDateValue(start_date);
//        var dateEnd = parseDateValue(end_date);
//        //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
//        //nama depan = 0
//        //nama belakang = 1
//        //tanggal terdaftar =2
//        var evalDate= parseDateValue(aData[2]);
//          if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
//               ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
//               ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
//               ( dateStart <= evalDate && evalDate <= dateEnd ) )
//          {
//              return true;
//          }
//          return false;
//    });
 
//    // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
//    function parseDateValue(rawDate) {
//        var dateArray= rawDate.split("/");
//        var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
//        return parsedDate;
//    }    
 
//    $( document ).ready(function() {
//    //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
//     var $dTable = $('#example').DataTable({
//      "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
//        "<'row'<'col-sm-12'tr>>" +
//        "<'row'<'col-sm-5'i><'col-sm-7'p>>"
//     });
 
//     //menambahkan daterangepicker di dalam datatables
//     $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');
 
//     document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";
 
//     //konfigurasi daterangepicker pada input dengan id datesearch
//     $('#datesearch').daterangepicker({
//        autoUpdateInput: false
//      });
 
//     //menangani proses saat apply date range
//      $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
//         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
//         start_date=picker.startDate.format('DD/MM/YYYY');
//         end_date=picker.endDate.format('DD/MM/YYYY');
//         $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
//         $dTable.draw();
//      });
 
//      $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
//        $(this).val('');
//        start_date='';
//        end_date='';
//        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
//        $dTable.draw();
//      });
//    });
    </script>


   

</body>

</html>