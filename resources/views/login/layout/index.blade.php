<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template2') }}/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('template2') }}/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-gradient-danger">

    <!-- Main content -->
    <div class="main-content">
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
        @yield('content')
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
