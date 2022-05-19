<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">

        <a href="{{ url('home') }}" class="logo ">
            {{-- <img src="{{ asset ('template') }}/assets/img/lambang.png" alt="navbar brand" class="navbar-brand" width="60"> --}}
            <h5 class="navbar-brand text-white pb-2 fw-bold"><b>DWIJATI AGUNG</b></h5>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
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
    <nav class="navbar navbar-header navbar-expand-lg bg-danger-gradient" data-background-color="dark">

        <div class="container-fluid">

            <ul class="nav justify-content-end ml-md-auto align-items-center">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                            document.getElementById('logout-form').submit();"
                            class="nav-link disabled">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <div>halo</div>
                @endauth
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                @if (Auth::user()->foto)
                    <div class="avatar-sm float-left mr-2">
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                @else
                    <div class="avatar-sm float-left mr-2">
                        <img src="{{ asset('foto') }}/profile/profile.png" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                @endif
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->nama }}
                            <span class="user-level"> {{ Auth::user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li class="{{ Request::is('profile*') ? 'active' : '' }}">
                                <a href="{{ url('profile/' . Auth::user()->id_user . '/edit') }}">
                                    <span>
                                        <p><i class="icon-settings mr-2"></i>Pengaturan</p>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ url('home') }}"><i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->role == 'Admin')
                    <li class="nav-item {{ Request::is('pengguna*') ? 'active' : '' }}">
                        <a href="{{ url('pengguna') }}"><i class="fas fa-user-friends"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#submenu">
                            <i class="fas fa-print"></i>
                            <p>Cetak Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="submenu">
                            <ul class="nav nav-collapse">
                                <li class="{{ Request::is('cetak_servis') ? 'active' : '' }}">
                                    <a href="{{ route('cetak_servis') }}">
                                        <span class="sub-item">Cetak Laporan Servis</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('cetak_keluhan') ? 'active' : '' }}">
                                    <a href="{{ route('cetak_keluhan') }}">
                                        <span class="sub-item">Cetak Laporan Keluhan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item {{ Request::is('jasa*') ? 'active' : '' }}">
                        <a href="{{ url('jasa') }}"><i class="fas fa-th-list"></i>
                            <p>Jasa & Barang </p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('servis*') ? 'active' : '' }}">
                        <a href="{{ url('servis') }}"> <i class="fas fa-archive"></i>
                            <p>Servis</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('keluhan*') ? 'active' : '' }}">
                        <a href="{{ url('keluhan') }}"><i class="fas fa-inbox"></i>
                            <p>Keluhan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('tindak_lanjut*') ? 'active' : '' }}">
                        <a href="{{ url('tindak_lanjut') }}">
                            <i class="fas fa-file-signature"></i>
                            <p>Tanggapan</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
