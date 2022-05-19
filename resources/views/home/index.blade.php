@extends('../layout.template')
@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category"> Pendapatan</p>
                                <h4 class="card-title">Rp. {{ number_format($sumPendapatan) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-settings text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Servis</p>
                                <h4 class="card-title">{{ $countServis }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-clock text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Keluhan</p>
                                <h4 class="card-title">{{ $countKeluhan }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-list text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Tanggapan</p>
                                <h4 class="card-title">{{ $countTindakLanjut }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Grafik Data Keluhan Tahun {{ $tahun }}</div>
                    </div>
                </div>
                <br>
                <div class="card-body mt-4">
                    <div class="chart-container" style="min-height: 400px">
                        <div id="chart"></div>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Keluhan Terbaru</div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($keluhanterbaru as $keluhan)
                        <div class="d-flex">
                            <div class="flex-1 ml-3 pt-1">
                                <h6 class="text-uppercase fw-bold mb-1">{{ $keluhan->nama }}
                                    @if ($keluhan->status == 'Open')
                                        <span class="text-success pl-3">{{ $keluhan->status }}</span>
                                    @else
                                        <span class="text-danger pl-3">{{ $keluhan->status }}</span>
                                    @endif
                                </h6>
                                <span class="text-muted">{{ $keluhan->pengaduan }}</span>
                            </div>
                            <div class="float-right pt-1">
                                <small
                                    class="text-muted font-italic">{{ date('d M Y', strtotime($keluhan->tgl_keluhan)) }}</small>
                            </div>
                        </div>
                        <div class="separator-dashed"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script>
        var servisData = {{ json_encode($servisData) }};
        var keluhanData = {{ json_encode($keluhanData) }};
        var bulan = {{ json_encode($bulan) }};
        Highcharts.chart('chart', {
            chart: {
                type: 'spline'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ]
            },
            yAxis: {
                title: {
                    text: 'Jumlah Data'
                },
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Servis',
                marker: {
                    symbol: 'diamond'
                },
                data: servisData

            }, {
                name: 'Keluhan',
                marker: {
                    symbol: 'diamond'
                },
                data: keluhanData
            }]
        });
    </script> --}}

    <script>
        var keluhanData = {{ json_encode($keluhanData) }};
        Highcharts.chart('chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Data'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b> {point.y:1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [ {
                name: 'Keluhan',
                data: keluhanData

            }]
        });
    </script>

@endsection
