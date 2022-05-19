<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi | Sistem Informasi Manajemen Keluhan Servis</title>
    <!-- Favicon -->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body style="background: linear-gradient(
87deg, #800000 0, #cd2828 100%)">

    <!-- Main content -->
    <div class=" main-content">
        <!-- Header -->

        <div class="container">
            <div class="header-body text-center ">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-4 px-5 mt-5">
                        {{-- <img src="{{ url('/foto/lambang.png') }}" alt="lambang" width="30%"> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--4 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="card bg-secondary border-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class=" text-center mt-2 mb-2">
                                <img src="{{ url('/foto/lambang.png') }}" alt="lambang" width="20%">
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center  mb-4">
                                Daftar Sekarang
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input placeholder="Nama" type="text" id="nama" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" required autofocus
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                        </div>
                                        <input class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="Alamat" type="text" id="alamat" name="alamat" required
                                            value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        <input class="form-control @error('no_telp') is-invalid @enderror"
                                            placeholder="No. Telepon" type="tel" id="no_tlp" name="no_tlp" required
                                            value="{{ old('no_tlp') }}">
                                        @error('no_tlp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" type="email" id="email" name="email" required
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" type="text" id="username" name="username" required
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" type="password" id="password" name="password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                </div>
                                <div class="text-center">
                                    {{-- <a href="" type="submit" class="btn btn-primary mt-5">Register</a> --}}
                                    <button type="submit" class="btn btn-default mt-5">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <p class="text-light"><small>Sudah memiliki akun?</small></p>
                            {{-- <a href="#" class="text-light"><small>Forgot password?</small></a> --}}
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('login') }}" class="text-light"><small>Login sekarang!</small></a>
                        </div>
                    </div>
                </div>
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
