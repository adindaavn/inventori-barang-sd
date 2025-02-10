<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title', 'iNVEntory')
    </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/js/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
    <script src="https://kit.fontawesome.com/5da161f671.js" crossorigin="anonymous"></script>
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="{{ asset('assets') }}/images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="{{ asset('assets') }}/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-lg-block ms-0">
                        <!-- <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1> -->
                        <!-- <h5 class="fw-semibold text-black">
                            @yield('title', 'Inventoris')
                        </h5> -->
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li> -->
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{ asset('assets') }}/images/faces/rei.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-sm rounded-circle" src="{{ asset('assets') }}/images/faces/rei.jpg" alt="Profile image">
                                <p class="mt-1 mb-0 fw-semibold">{{ auth()->user()->user_nama }}</p>
                                <p class="fw-light text-muted mb-0">{{ auth()->user()->user_hak }}</p>
                            </div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <!-- <i class="mdi mdi-home menu-icon"></i> -->
                            <i class="menu-icon fa-solid fa-box-open"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    @if (auth()->user()->user_hak == 'user' || auth()->user()->user_hak == 'SU')
                    <!-- nav-item barang -->
                    <li class="nav-item nav-category">Barang</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang.index') }}">
                            <i class="menu-icon icon-sm fa-sm fa-solid fa-box"></i>
                            <span class="menu-title">Barang Inventaris</span>
                        </a>
                    </li>

                    <!-- nav-item peminjaman -->
                    <li class="nav-item nav-category">Peminjaman</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peminjaman.index') }}">
                            <i class="menu-icon fa-xs fa-solid fa-clipboard-list"></i>
                            <span class="menu-title">Peminjaman</span>
                        </a>
                    </li>
                    @endif

                    @if (auth()->user()->user_hak == 'admin' || auth()->user()->user_hak == 'SU')
                    <!-- nav-item laporan -->
                    <li class="nav-item nav-category">Laporan</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="menu-icon fa-xs fa-solid fa-clipboard-list"></i>
                            <span class="menu-title">Laporan</span>
                        </a>
                    </li>

                    <!-- nav-item referensi -->
                    <li class="nav-item nav-category">Referensi</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#referensi" aria-expanded="false" aria-controls="referensi">
                            <i class="menu-icon fa-xs fa-solid fa-clipboard-list"></i>
                            <span class="menu-title">Referensi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="referensi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('jenis-barang.index') }}">Jenis Barang</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('daftar-pengguna') }}">Daftar Pengguna</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('siswa') }}">Siswa</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- <div class="row"> -->
                    <!--  Header End -->
                    <!-- Main Content -->
                    <section class="content">
                        @yield('content')
                    </section>
                    <!-- Main Content End -->
                    <!-- Footer -->
                    <!-- </div> -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- plugins:js -->
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/sweetalert/sweetalert.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets') }}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/select2/select2.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets') }}/assets/js/formpickers.js"></script>
    <script src="{{ asset('assets') }}/assets/js/chart.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/select2.js"></script>
    <script src="{{ asset('assets') }}/js/Chart.roundedBarCharts.js"></script>
    <script src="{{ asset('assets') }}/js/data-table.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- End custom js for this page-->
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session("error") }}',
            confirmButtonColor: "#54b4e4",
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $(".btn-delete").click(function() {
                let id = $(this).data("id");
                let actionUrl = $(this).data("action");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#f95f53",
                    cancelButtonColor: "#54b4e4",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("<form>", {
                            "method": "POST",
                            "action": actionUrl // Gunakan URL dari tombol
                        }).append(
                            $("<input>", {
                                "type": "hidden",
                                "name": "_token",
                                "value": "{{ csrf_token() }}"
                            }),
                            $("<input>", {
                                "type": "hidden",
                                "name": "_method",
                                "value": "DELETE"
                            })
                        ).appendTo("body").submit();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".btn-kembali").click(function() {
                let id = $(this).data("id");
                let actionUrl = $(this).data("action");

                Swal.fire({
                    title: 'Kembalikan peminjaman?',
                    text: "Make sure barang peminjaman sudah kembali",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: "#34B1AA",
                    cancelButtonColor: "#54b4e4",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("<form>", {
                            "method": "POST",
                            "action": actionUrl
                        }).append(
                            $("<input>", {
                                "type": "hidden",
                                "name": "_token",
                                "value": "{{ csrf_token() }}"
                            })).append(
                            $("<input>", {
                                "type": "hidden",
                                "name": "pb_id",
                                "value": id
                            })
                        ).appendTo("body").submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('[id^=table]').DataTable({
                dom: "<'d-flex align-items-center justify-content-between'Bf>t<'d-flex align-items-center justify-content-between'ip>",
                // dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                    {
                        extend: 'colvis'
                    }
                ]
            });
        });
    </script>

    <script>
        function previewFoto() {
            const foto = document.querySelector('#foto');
            const fotoPreview = document.querySelector('.foto-preview');

            fotoPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                fotoPreview.src = oFREvent.target.result;
            }
        }
    </script>
</body>

</html>