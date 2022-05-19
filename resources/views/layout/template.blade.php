<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Manajemen Penanganan Keluhan Servis</title>
    <link rel="icon" href="{{ url('/foto/lambang.png') }}" type="image/x-icon"/>
    <!-- Fonts and icons -->
    <script src="{{ asset('template') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('template') }}/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/atlantis.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        @include('layout.nav')

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-danger-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                                <h5 class="text-white op-7 mb-2"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">


                    @yield('content')
                    <footer class="footer">
                        <div class="container-fluid">
                            <nav class="pull-left">
                                
                            </nav>
                            <div class="copyright ml-auto">
                                Copyright &copy; <strong><span>2022</span></strong> PT Dwijati Agung Motor
                            </div>				
                        </div>
                    </footer>
                </div>
                


                <!--   Core JS Files   -->
                <script src="{{ asset('template') }}/assets/js/core/jquery.3.2.1.min.js"></script>
                <script src="{{ asset('template') }}/assets/js/core/popper.min.js"></script>
                <script src="{{ asset('template') }}/assets/js/core/bootstrap.min.js"></script>

                <!-- jQuery UI -->
                <script src="{{ asset('template') }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
                <script src="{{ asset('template') }}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

                <!-- jQuery Scrollbar -->
                <script src="{{ asset('template') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


                <!-- Chart JS -->
                <script src="{{ asset('template') }}/assets/js/plugin/chart.js/chart.min.js"></script>

                <!-- jQuery Sparkline -->
                <script src="{{ asset('template') }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

                <!-- Chart Circle -->
                <script src="{{ asset('template') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

                <!-- Datatables -->
                <script src="{{ asset('template') }}/assets/js/plugin/datatables/datatables.min.js"></script>


                <!-- jQuery Vector Maps -->
                <script src="{{ asset('template') }}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
                <script src="{{ asset('template') }}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

                <!-- Sweet Alert -->
                <script src="{{ asset('template') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

                <!-- Atlantis JS -->
                <script src="{{ asset('template') }}/assets/js/atlantis.min.js"></script>

                <!-- Atlantis DEMO methods, don't include it in your project! -->
                <script src="{{ asset('template') }}/assets/js/setting-demo.js"></script>
                <script src="{{ asset('template') }}/assets/js/demo.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                {{-- status-user --}}
                <script>
                    $('.status-user').click(function() {
                        var dataid = $(this).attr('data-id');
                        var nama = $(this).attr('data-nama');
                        swal({
                                title: "Yakin Ingin Merubah Status?",
                                icon: "warning",
                                dangerMode: true,
                                buttons: {
                                    cancel: {
                                        visible: true,
                                        text: 'Tidak',
                                        className: 'btn btn-light'
                                    },
                                    confirm: {
                                        text: 'Ya',
                                        className: 'btn btn-info'
                                    }
                                }
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "pengguna/status/" + dataid + "",
                                        swal("Data Berhasil Diubah", {
                                            icon: "success",
                                        });
                                } else {
                                    swal("Data Tidak Berhasil Diubah");
                                }
                            });
                    });
                </script>

                {{-- status keluhan --}}
                <script>
                    $('.status-keluhan').click(function() {
                        var dataid = $(this).attr('data-id');
                        var nama = $(this).attr('data-nama');
                        swal({
                                title: "Yakin Ingin Merubah Status?",
                                icon: "warning",
                                dangerMode: true,
                                buttons: {
                                    cancel: {
                                        visible: true,
                                        text: 'Tidak',
                                        className: 'btn btn-light'
                                    },
                                    confirm: {
                                        text: 'Ya',
                                        className: 'btn btn-info'
                                    }
                                }
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "keluhan/status/" + dataid + "",
                                        swal("Data Berhasil Diubah", {
                                            icon: "success",
                                        });
                                } else {
                                    swal("Data Tidak Berhasil Diubah");
                                }
                            });
                    });
                </script>
                <script>
                    $('#basic-datatables').DataTable();
                </script>

</body>

</html>
