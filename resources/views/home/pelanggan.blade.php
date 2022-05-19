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

            <div class=" me-auto"><a href="{{ url('pelanggan') }}">
                    <img src="{{ url('/foto/lambang.png') }}" alt="lambang" width="25%"></a></div>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ url('pelanggan') }}"
                            class="{{ Request::is('pelanggan*') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('cari') }}"
                            class="{{ Request::is('pelanggan/search*') ? 'active' : '' }}">Keluhan</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">


            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(foto/bg-mechanic.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Sistem Manajemen Penanganan
                                Keluhan <span> </span>
                            </h2>
                            <h2 class="animate__animated animate__fadeInDown"> <span> PT Dwijati
                                    Agung Motor</span></h2>
                            <p class="animate__animated animate__fadeInUp">Memiliki Keluhan ?</p>
                            <a href="{{ route('cari') }}"
                                class="btn-get-started animate__animated animate__fadeInUp scrollto">Laporkan
                                Sekarang</a>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-4">
                        <h2>About Us</h2>
                        <h5 class="fst-italic">Mengenal Lebih Jauh Tentang PT Dwijati Agung Motor Honda</h5>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0">
                        <p>
                            Merupakan dealer resmi motor Honda Kota Denpasar. Melalui dealer ini, Honda menawarkan
                            produk-produk
                            motor terbaru mulai dari motor bebek honda seperti Honda Supra Fit dan Supra X, motor matic
                            seperti Honda Beat, Varia dan PCX, hingga motor besar seperti Honda Mega Pro dan CBR 250.

                        </p>
                        <p>
                            Dealer motor ini manawarkan dan jual motor honda Kota Denpasar dengan harga terjangkau,
                            bahkan terdapat diskon pembelian, potongan harga, promo honda, dan bonus lain dari setiap
                            pembelian.
                        </p>
                        <p>
                            Selain kelebihan tersebut, Honda Dwi Jati Agung Motor juga menawarkan pembelian secara tunai
                            atau lewat skema kredit motor honda Kota Denpasar. Terdapat juga bengkel service untuk
                            service motor, suku cadang dan spare parts.
                        </p>
                        <p>
                            Segera kunjungi dealer motor Honda terdekat ini pada hari dan jam buka untuk informasi
                            lainnya seperti daftar harga motor honda Kota Denpasar, info harga motor, inden, harga OTR,
                            dan lainnya. Anda juga dapat menghubungi kontak Kota Denpasar untuk informasi lebih lanjut.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->



        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-calendar4-week"></i>
                            <h4>Jam Operasi</h4>
                            <p>Senin-Minggu, Jam 08.00-17.00 WITA</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-box">
                            <i class="bi bi-cash-stack"></i>
                            <h4>Harga Kompetitif</h4>
                            <p>Kami menawarkan harga yang terjangkau</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-card-checklist"></i>
                            <h4>Proses Cepat dan Mudah</h4>
                            <p>Kami selalu berupaya memberikan pelayanan secepat mungkin untuk para pelanggan</p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-percent"></i>
                            <h4>Banyak Promo Menarik</h4>
                            <p>Kami menawarkan banyak promo menarik untuk Anda</p>
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

</body>

</html>
