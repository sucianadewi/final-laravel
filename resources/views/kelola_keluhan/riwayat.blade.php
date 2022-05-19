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
                    <h2>Detail Keluhan</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Search Section ======= -->
        <section id="search" class="search">
            <div class="container">
                
                <div class="row justify-content-center mt-4">
                    <div class="col-md-8">
                        <div class="card-body">
                            <table class="table">
                                    <tr>
                                        <th>Tanggal Pengaduan</th>
                                        <td>:</td>
                                        <td>{{ date('d-m-Y', strtotime($keluhan->tgl_keluhan)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Pengaduan</th>
                                        <td>:</td>
                                        <td>{{ $keluhan->no_keluhan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pengadu</th>
                                        <td>:</td>
                                        <td>{{ $keluhan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon</th>
                                        <td>:</td>
                                        <td>{{ $keluhan->no_tlp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>:</td>
                                        <td>{{ $keluhan->pengaduan }}</td>
                                    </tr>
                            </table>

                            <div class="card-header mt-4">
                                <h4>
                                    Tanggapan Keluhan
                                </h4>
                                <hr>
                            </div>
                            <div>
                                <table class="table  table-bordered " style=" border-color: gray;">
                                    <tr class="text-center bg-light">
                                        <th width="20%">Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    @if (count($join)>0)
                                        @foreach ($join as $item => $join)
                                        <tr>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($join->tgl_penanganan)) }} </td>
                                            <td>{{ $join->keterangan }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                            Belum Ada Tanggapan Keluhan!
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                            
                            <div class="form-group text-right mt-4" style="text-align: left">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>




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
                &copy; Copyright <strong><span>2022</span></strong>. All Rights Reserved
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

</body>

</html>
