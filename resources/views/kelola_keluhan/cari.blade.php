<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi Manajemen Penanganan Keluhan Servis</title>
    <link rel="icon" href="{{ url('/foto/lambang.png') }}" type="image"/>
    {{-- <!-- Favicons -->
    <link href="{{ asset('template3') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template3') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    <h2>Cari Riwayat Servis</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Search Section ======= -->
        <section id="search" class="search">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>

                        @elseif (Session::has('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif
                        <form action="{{ url('pencarian') }}" method="GET">
                            <div class="form-group mb-3">
                                <label for="">Masukkan No. Nota :</label>
                                <input type="text" class="form-control @error('no_nota') is-invalid @enderror"
                                    placeholder="cth: SV/19982/000012" name="no_nota"
                                    value="{{ request('no_nota') }}" required>
                                @error('no_nota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Masukkan No. Polisi :</label>
                                <input type="text" class="form-control @error('no_polisi') is-invalid @enderror"
                                    placeholder="cth: DK0000JK" name="no_polisi" value="{{ request('no_polisi') }}"
                                    required>
                                @error('no_polisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-round" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div> <br>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-8 menu">
                        @if (isset($result))
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal Servis</th>
                                        <th>No. Polisi</th>
                                        <th>Nama</th>
                                        <th>Tipe Motor</th>
                                        <th>Total Biaya (Rp)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($result) > 0)
                                        @foreach ($result as $item)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($item->tgl_servis)) }}</td>
                                                <td>{{ $item->no_polisi }}</td>
                                                <td>{{ $item->nama_pemilik }}</td>
                                                <td>{{ $item->tipe_motor }}</td>
                                                <td style="text-align: right">{{ number_format($item->total_biaya) }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('pelanggan/tambah/' . $item->id_servis) }}"
                                                        class="btn btn-sm btn-primary btn-round" target="_blank"> <i
                                                            class="bi bi-plus"></i>
                                                        Laporan Keluhan</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" style="text-align: center;">Tidak Ada Data Yang Ditemukan!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <br>

                            <div class="badan">

                            </div>
                            @if (count($keluhan) > 0)
                            <div class="card-header mt-4">
                                <h3>
                                    Riwayat Pengaduan Keluhan
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table  table-bordered " style=" border-color: gray;">
                                    <tr class="text-center bg-light">
                                        <th width="20%">Tanggal Pengaduan</th>
                                        <th width="20%">No. Pengaduan</th>
                                        <th>Keterangan</th>
                                        <th width="10%">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($keluhan as $item => $keluhan)
                                        <tr>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($keluhan->tgl_keluhan)) }}</td>
                                            <td class="text-center">{{ $keluhan->no_keluhan }}</td>
                                            <td>{{ $keluhan->pengaduan }}</td>
                                            <td class="text-center ">
                                                @if ($keluhan->status == 'Open')
                                                    <p class="text-success"><b>
                                                            {{ $keluhan->status }}

                                                        </b>
                                                    </p>
                                                @else
                                                    <p class="text-danger"><b>
                                                            {{ $keluhan->status }}
                                                        </b>
                                                    </p>
                                                @endif

                                            </td>
                                                <td class="text-center">
                                                    <a href="{{ url('pelanggan/detail/' . $keluhan->id_keluhan) }}"
                                                        class="btn btn-sm btn-info"> <i class="bi bi-eye mr-2"></i>
                                                    </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                    </div>

                    @endif


                </div>
            </div>
            </div>

            </div>

            </div>
        </section><!-- End Search Section -->


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
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('pelanggan') }}">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('cari') }}">Keluhan</a></li>
                        </ul>
                    </div>


                    {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div> --}}

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                Copyright &copy; <strong><span>2022</span></strong> PT Dwijati Agung Motor
            </div>
            {{-- <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}
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
    {{-- <script>
        $(document).ready(function() {
            readData()
            $("#input").keyup(function() {
                var strcari = $("#input").val();
                if (strcari != "") {
                    $("#read").html('<p class="text-muted">Menunggu Mencari Data</p>');
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax') }}",
                        data: "no_polisi=" + strcari,
                        success: function(data) {
                            $("#read").html(data);
                        }
                    });
                } else {
                    readData()
                }

            });
        });

        function readData() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
    </script> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.klik_menu').click(function() {
                var menu = $(this).attr('id');
                if (menu == "riwayat") {
                    $('.badan').load('riwayat.blade.php');
                }
            });


            // halaman yang di load default pertama kali
            $('.badan').load('home.php');

        });
    </script> --}}
    <script>
        function klikriwayat() {

            $.get("riwayat.blade.php", function(data) {
                $("#badan").html(data);
            });
        }
    </script>
</body>

</html>
