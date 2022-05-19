<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 5px; margin-right: 20px; margin-left: 20px; margin-bottom: 5px;">
        <div style="float: left">
            <img src="{{ asset('foto/logoweb.jpg') }}" alt="lambang" width="85px">
        </div>
        <div class="row" style="float: inherit">
            <table style="width: 100%; text-align: center;">
                <tr style="">
                    <th style="font-size: 30px;">
                        PT DWIJATI AGUNG MOTOR
                    </th>
                </tr>
                <tr>
                    <td style="font-size: 15px;">
                        Jl. Tukad Pakerisan No.56, Denpasar, Bali, Indonesia

                    </td>

                </tr>
                <tr>
                    <td style="font-size: 15px;">
                        No. Telepon : (0361) 234088

                    </td>
                </tr>
            </table>
        </div>

        <hr style="border: 1px solid">
        <div style="margin-top: 20px;  ">
            <h3 style="text-align: center; font-size: 20px">{{ $data['title'] }}</h3>
            <p style="text-align: right">Periode : {{ date('d-m-Y', strtotime($tgl_awal)) }} s/d {{ date('d-m-Y', strtotime($tgl_akhir)) }} </p>
        </div>
        <div class="row" style="margin-top: 20px">
            <table style="width: 100%; text-align: center; border:1px;" rules="all" cellpadding="7" border="1">
                <thead>
                    <tr>
                        <th style="width: 5%">No.</th>
                        <th>Tgl. Servis</th>
                        <th>No. Nota</th>
                        <th>Nama</th>
                        <th>No. Polisi</th>
                        <th>Tipe Motor</th>
                        <th>Total Biaya (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($cetakPertanggal as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tgl_servis)) }}
                            </td>
                            <td>{{ $item->no_nota }}</td>
                            <td>{{ $item->nama_pemilik }}</td>
                            <td>{{ $item->no_polisi }}</td>
                            <td>{{ $item->tipe_motor }}</td>
                            <td style="text-align: right">{{ number_format($item->total_biaya) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" style="margin-top: 20px; float: right;">
            <p style="">Denpasar, {{ $data['date'] }}</p>
            <p style="">Mengetahui,</p>
            <br>
            <br>
            <br>
            <p style="">(............................................)</p>
        </div>
    </div>

    </div>


</body>

</html>
