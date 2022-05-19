<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login | Sistem Informasi Manajemen Keluhan Servis</title>
    <link rel="icon" href="{{ url('/foto/lambang.png') }}" type="image/png"/>
    <!-- Favicon -->
    {{-- <link rel="icon" href="{{ asset('template2') }}/assets/img/brand/favicon.png" type="image/png"> --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/css/argon.css?v=1.2.0" type="text/css">

</head>

<body style="background: linear-gradient(
87deg, #800000 0, #cd2828 100%)">

    {{-- <body class="bg-gradient-danger"> --}}

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->

        <div class="container">
            <div class="header-body text-center ">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-4 px-5 mt-5">
                        {{-- <h1 class="text-light">Sistem Informasi Manajemen Keluhan Servis PT Dwijati Agung Motor</h1> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt-4 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    @if (count($errors) > 0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{-- <span class="alert-icon"><i class="ni ni-bell-55"></i></span> --}}

                            @foreach ($errors->all() as $error)
                                <span class="alert-text"><strong>{{ $error }}</strong>

                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            @endforeach

                        </div>
                    @endif

                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class="btn-wrapper text-center mt-2 mb-2">
                                <img src="{{ url('/foto/lambang.png') }}" alt="lambang" width="30%">
                            </div>
                        </div>
                        @if (Session::has('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Login Sekarang !</small>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" id="email"
                                            name="email" autofocus required value="{{ old('email') }}">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password"
                                            id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p class="text-light font-italic"><small>*Note : Jika lupa password silahkan hubungi admin</small></p>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-6">
                            <p class="text-light"><small>Belum memiliki akun?</small></p>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ url('/register') }}" class="text-light"><small>Buat akun baru</small></a>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('template2') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template2') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template2') }}/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('template2') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('template2') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="{{ asset('template2') }}/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
