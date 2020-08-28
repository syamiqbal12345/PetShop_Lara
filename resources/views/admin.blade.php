<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>UMKM</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="/" class="logo">
                <img src="{{ asset('assets/img/21.png') }}" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            <div class="container-fluid">
                <div class="collapse" id="search-nav">
                    <form class="navbar-left navbar-form nav-search mr-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Search ..." class="form-control">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="../assets/img/profile4.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="../assets/img/profile4.jpg" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>M Iqbal</h4>
                                            <p class="text-muted">iqbal.syam12@gmail.com</p><a href="/edit" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/login">Login</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src="../assets/img/profile4.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    M Iqbal
                                    <span class="user-level">Admin</span>
                                    </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav"></ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item active">
                        <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>UMKM</p>
                        </a>
                    </li>
                    <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                        <h4 class="text-section">Komponen</h4>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Daftar Pengguna</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a class="nav-link" href="http://127.0.0.1:8000/users">
                                        <span class="sub-item">Customer</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="http://127.0.0.1:8000/toko">
                                        <span class="sub-item">Pemilik Toko</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="http://127.0.0.1:8000/users">
                                        <span class="sub-item">Kurir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#tables">
                            <i class="fas fa-table"></i>
                            <p>Transaksi</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a class="nav-link" href="http://127.0.0.1:8000/itemtransaksi">
                                        <span class="sub-item">Transaksi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#maps">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Maps</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="maps">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a class="nav-link" href="https://www.google.co.id/maps/place/Kota+Samarinda,+Kalimantan+Timur/@-0.5096845,117.0354397,11z/data=!3m1!4b1!4m5!3m4!1s0x2df5d57d33074935:0xef64e9b06c7ad3e7!8m2!3d-0.5016166!4d117.1264753?hl=id">
                                        <span class="sub-item">Google Maps</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#submenu">
                            <i class="fas fa-bars"></i>
                            <p>About</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="submenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a data-toggle="collapse" href="../assets/html/CS.html">
                                        <span class="sub-item">Customer Service</span>
                                    </a>
                                <li>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Admin</h2>
                            <h5 class="text-white op-7 mb-2"></h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            @if(auth()->user())
                                @if(auth()->user()->pengguna->toko->count() ==0)
                                    <a href="{{ route("toko.create") }}" class="btn btn-secondary btn-round">Buka Toko</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">

                @yield("content")

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Al-Khawarizmi Team
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../assets/html/CS.html">
                                    Help
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2019, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Al-Khawarizmi Team</a>
                    </div>
                </div>
            </footer>
        </div>
        <!--   Core JS Files   -->

        <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>

        <!-- jQuery UI -->
        <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


        <!-- Chart JS -->
        <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

        <!-- Atlantis JS -->
        <script src="{{ asset('assets/js/atlantis.min.js')}}"></script>
</body>
</html>
