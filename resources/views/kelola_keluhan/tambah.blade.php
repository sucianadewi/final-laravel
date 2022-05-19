<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Manajemen Penanganan Keluhan Servis</title>
    <link rel="icon" href="{{ url('/foto/lambang.png') }}" type="image"/>

    <!-- Favicons -->
    {{-- <link href="{{ asset('template3') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template3') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template3') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template3') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template3') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ url('pelanggan') }}">DWIJATI AGUNG</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ url('pelanggan') }}"
                            class="{{ Request::is('pelanggan') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('cari') }}"
                            class="{{ Request::is('pelanggan/search*') ? 'active' : '' }}">Keluhan</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Laporkan Keluhan</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Search Section ======= -->
        <section id="search" class="search">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ url('pelanggan') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="hidden" id="id_servis" name="id_servis" class="form-control input-pill"
                                    value="{{ $dtServis->id_servis }}">
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label for="tgl_servis">Tanggal Servis</label>
                                <input type="" id="tgl_servis" name="tgl_servis" class="form-control input-pill"
                                    value="{{ date('d-m-Y', strtotime($dtServis->tgl_servis)) }}" readonly>
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="nama">Nama </label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control input-pill @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" placeholder=" Masukkan Nama Anda..." required
                                    autofocus>
                                @error('nama')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_tlp">No. Telepon</label>
                                <input type="number" id="no_tlp" name="no_tlp"
                                    class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                    value="{{ old('no_tlp') }}" placeholder="Masukkan No. Telepon Anda..." required>
                                @error('no_tlp')
                                    <div class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="pengaduan">Keluhan</label>
                                <textarea type="text" id="pengaduan" name="pengaduan"
                                    class="form-control input-pill @error('pengaduan') is-invalid @enderror"
                                    value="" placeholder="Masukkan Keluhan Anda..."
                                    required>{{ old('pengaduan') }}</textarea>
                                @error('pengaduan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="bukti">Bukti Nota Servis</label>
                                <input type="file"
                                    class="form-control @error('bukti') is-invalid @enderror" id="bukti"
                                    name="bukti">
                                @error('bukti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group text-right mt-4" style="text-align: right">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            </div>
        </section><!-- End Services Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-6">
                        <div class="footer-info">
                            <h3>PT Dwijati Agung Motor</h3>
                            <p>
                                Jl. Tukad Pakerisan No.56, Denpasar, Bali, Indonesia<br><br>
                                <strong>Kode Pos :</strong> 80225<br>
                                <strong>No. Tlp. :</strong> (0361) 234088<br>
                                <strong>Email :</strong> dwijatiagungmotor@gmail.com<br>

                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Keluhan</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                Copyright &copy; <strong><span>2022</span></strong> PT Dwijati Agung Motor
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template3') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template3') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('template3') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('template3') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('template3') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ asset('template3') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template3') }}/assets/js/main.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


</body>

</html>
