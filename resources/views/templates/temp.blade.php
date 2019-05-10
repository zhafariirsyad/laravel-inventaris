<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/img/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/normalize.css') }}">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/wave/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/wave/button.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/notika-custom-icon.css') }}">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.dataTables.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('asset/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="{{ asset('asset/img/logo/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="dropdown-trig-sgn" style="margin-left:80%; margin-top:2%;">
                        @if(Auth::guard('web')->check())
                            <button class="btn triger-fadeIn" data-toggle="dropdown">{{ Auth::user()->name }} - ({{ Auth::user()->level->name }})</button>
                        @elseif(Auth::guard('employee')->check())
                            <button class="btn triger-fadeIn" data-toggle="dropdown">{{ Auth::guard('employee')->user()->name }} - ({{ Auth::guard('employee')->user()->nip }})</button>
                        @endif

                        <ul class="dropdown-menu triger-fadeIn-dp" style="margin-left:78%;">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        @if(Auth::guard('web')->check())
                            @if(Auth::guard('web')->check() && Auth::user()->level->id == 1)
                                <li><a href="{{ route('dash') }}"><i class="notika-icon notika-house"></i> Dashboard</a>
                                <li><a href="{{ route('type.index') }}"><i class="notika-icon notika-house"></i> Tipe</a>
                                </li>
                                <li><a href="{{ route('room.index') }}"><i class="notika-icon notika-mail"></i> Ruangan</a>
                                </li>
                                <li><a href="{{ route('item.index') }}"><i class="notika-icon notika-edit"></i> Barang</a>
                                </li>
                                <li><a href="{{ route('employee.index') }}"><i class="notika-icon notika-bar-chart"></i> Pegawai</a>
                                </li>
                                <li><a href="{{ route('user.index') }}"><i class="notika-icon notika-bar-chart"></i> User</a>
                                </li>
                                <li><a href="{{ route('broken_item.index') }}"><i class="notika-icon notika-edit"></i> Barang Rusak</a>
                                </li>
                                <li><a href="{{ route('borrow.index') }}"><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                                </li>
                                <li><a href="{{ route('report.index') }}"><i class="notika-icon notika-bar-chart"></i> Report</a>
                                </li>
                            @elseif(Auth::guard('web')->check() && Auth::user()->level->id == 2)
                                <li><a href="{{ route('borrow.index') }}"><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                                </li>
                            @endif
                        @else
                            <li><a href="{{ route('borrow.index') }}"><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                                </li>
                        @endif



{{--                         <li><a href=""><i class="notika-icon notika-bar-chart"></i> Peminjaman</a>
                        </li> 
 --}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.btn-delete').on('click',function(e){
                e.preventDefault();
                let conf = confirm("Yakin?");
                if(conf){
                    let href = $(this).attr('href');
                    $('#delete-form').attr('action',href).submit();
                }
            });
        });
    </script>
    <form action="" method="post" id="delete-form">
        @csrf @method('delete')
    </form>


    <!-- jquery
        ============================================ -->
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('asset/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('asset/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('asset/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('asset/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('asset/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('asset/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar J  S
        ============================================ -->
    <script src="{{ asset('asset/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('asset/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('asset/js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS
        ============================================ -->
    <script src="{{ asset('asset/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('asset/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('asset/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{ asset('asset/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('asset/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('asset/js/knob/knob-active.js') }}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{ asset('asset/js/chat/jquery.chat.js') }}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{ asset('asset/js/todo/jquery.todo.js') }}"></script>
    <!--  wave JS
        ============================================ -->
    <script src="{{ asset('asset/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('asset/js/wave/wave-active.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('asset/js/plugins.js') }}"></script>
    <!-- Data Table JS
        ============================================ -->
    <script src="{{ asset('asset/js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/js/data-table/data-table-act.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!-- <script src="{{ asset('asset/js/tawk-chat.js') }}"></script> -->
    </body>

    </html>
