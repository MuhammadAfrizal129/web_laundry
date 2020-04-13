<div class="app-sidebar p-b sidebar-shadow">
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                            <div class="widget-content mt-2">
                                <div class="widget-content-wrapper">
                                @auth
                                    <div class="widget-content-left">
                                        @if(Auth::user()->pp = "")
                                        <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars'. Auth::user()->pp)}}" alt="">
                                        @else
                                        <img width="40" height="40" class="rounded-circle" src="{{ asset('assets/images/avatars/users.png')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="widget-content-left  ml-3 ">
                                        <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                        </div>
                                        <div class="widget-subheading">
                                        {{ Auth::user()->nis }}
                                        </div>
                                    </div>
                                @else

                                @endauth
                                </div>
                            </div>
                        <ul class="vertical-nav-menu">
                        <li>
                            <a href="{{ url('/home')}}">
                                <i class="metismenu-icon fa fa-home"> </i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/datasiswa/getData')}}" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Transaksi
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/datasiswa')}}">
                                <i class="metismenu-icon fa fa-edit"></i>
                                Paket
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/datapelanggaran')}}">
                                <i class="metismenu-icon fa fa-home"></i>
                                Outlet
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/datamember')}}">
                                <i class="metismenu-icon fa fa-home"></i>
                                Pelanggan
                            </a>
                        </li>
                        </ul>
                    </div>

                </div>
            </div>
