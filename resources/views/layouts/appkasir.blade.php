<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name', 'Nyeseuh') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Style -->
    <link href="{{ asset('assets/style/main.css') }}" rel="stylesheet"></head>
    <link href="{{ asset('css/fontawesome-v5.6.3/css/all.css') }}" rel="stylesheet">
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('logo/logo.png')}}" type="image/x-icon">

    <!-- datatable -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<style>
    .p-b{
        display: none;
    }
    .app-header-center{
        align-items:center;
        display:flex;
        margin-left:auto
    }
    @media (max-width: 900px){
        .p-b{
        display: block;
        }
        .b-p{
            display: none;
        }
        .app-header-center{
            display:flex;
            align-items:center
        }
    }

</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo p-b">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <div class="btn-group">
                        @auth
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                        @if(Auth::user()->pp = "")
                            <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars/'. Auth::user()->pp)}}" alt="">
                        @else
                            <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars/users.png')}}" alt="">
                        @endif
                        </a>
                        @else
                        <a class=" btn-transition btn btn-outline-primary mr-2" href="{{ route('login') }}">Login</a>
                        @endauth
                        <div  aria-hidden="true" class="dropdown-menu">
                            <a href="{{ url('/profile')}}" class="dropdown-item">
                                <i class="nav-link-icon fa fa-user"> </i>
                                &nbsp; Profile
                            </a>
                            <hr>
                            <a  class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="nav-link-icon fa fa-sign-out"> </i>
                            &nbsp; {{ __('exit') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </div>
                    </div>
                </span>
            </div>
            <div class="b-p app-header__content">
                <div class="navbar-brand b-p">
                    <h2>Nyeseuh</h2>
                </div>
                <div class="app-header-center">
                    @auth
                    <ul class="header-menu nav b-p">
                        <li class="nav-item">
                            <a href="{{ url('/kasir/homeKasir')}}" class="nav-link">
                                <i class="nav-link-icon fa fa-home"> </i>
                                Home
                            </a>
                        <li class="nav-item">
                            <a href="{{ url('/kasir/datatransaksi')}}" class="nav-link">
                            <i class="nav-link-icon fa fa-edit"></i>
                                Transaksi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('kasir/datamember')}}" class="nav-link">
                                <i class="nav-link-icon fa fa-home"></i>
                                Pelanggan
                            </a>
                        </li>
                    </ul>
                    @endauth
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                @auth
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        @if(Auth::user()->pp = "")
                                        <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars/'. Auth::user()->pp)}}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        @else
                                        <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars/users.png')}}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        @endif
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ url('/profile')}}" class="dropdown-item">
                                                <i class="nav-link-icon fa fa-user"> </i>
                                                &nbsp; Profile
                                            </a>
                                            <hr>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="nav-link-icon fa fa-sign-out"> </i>
                                                &nbsp; {{ __('exit') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                    {{ Auth::user()->name }} (Kasir)
                                    </div>
                                    <div class="widget-subheading">
                                    {{ Auth::user()->email }}
                                    </div>
                                </div>
                                @else
                                    <a class=" btn-transition btn btn-outline-primary mr-2" href="{{ route('login') }}">Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="app-main">
            <!-- side Bar -->
            @include('layouts.sidebar')
            <!--/ side Bar -->
            <!-- Content -->
            <div class="container pt-3">
                @yield('content')
            </div>
            <!--/ Content -->

            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
        <!--/ Main Content -->
    </div>
<!-- jquery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
<!-- main js -->
<script type="text/javascript" src="{{ asset('assets/scripts/main.js')}}"></script>
<!-- datatable -->
<script src="{{ asset('css/datatables/jquery.dataTables.js') }} "></script>
<script src="{{ asset('css/datatables/dataTables.bootstrap4.min.js') }} "></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<!-- // -->
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
</body>
</html>
