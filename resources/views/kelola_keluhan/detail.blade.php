@extends('../layout.template')
@section('title', 'Detail Pengaduan Keluhan')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">No. Pengaduan</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ $dataKeluhan->no_keluhan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Tanggal Pengaduan</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ date('d-m-Y', strtotime($dataKeluhan->tgl_keluhan)) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Nama Pengadu</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ $dataKeluhan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">No. Telepon</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ $dataKeluhan->no_tlp }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Keterangan</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ $dataKeluhan->pengaduan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Bukti</th>
                                        <td style="width:5%">:</td>
                                        <td class="mt-2">
                                            <br>
                                            <a href="{{ asset('storage/' . $dataKeluhan->bukti) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $dataKeluhan->bukti) }}" class="img"
                                                    width="40%" alt="...">
                                                <br></a><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- <tr>
                            <td><div class="mt-2">
                                <a href="{{ asset('storage/' . $dataKeluhan->bukti) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $dataKeluhan->bukti) }}" class="img"
                                        width="70%" alt="..."></a>
                            </div>
                            
                        </tr> --}}
                        <div class="form-group mt-4">
                            <a href="{{ url('keluhan') }}" class="btn btn-danger btn-round"><span
                                    class="btn-label mr-2"><i class="fa fa-arrow-circle-left"></i></span>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
