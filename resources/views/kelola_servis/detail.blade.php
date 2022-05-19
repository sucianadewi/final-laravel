@extends('../layout.template')
@section('title', 'Detail Data Servis')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">Tanggal Servis</th>
                                        <td style="width:5%">:</td>
                                        <td>{{ date('d M Y', strtotime($dataServis->tgl_servis)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->nama_pemilik }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->no_tlp }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Polisi</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->no_polisi }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Nota</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->no_nota }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Motor</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->tipe_motor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mekanik</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->mekanik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>:</td>
                                        <td>{{ $dataServis->keterangan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h2 class="card-header mt-4">
                            <strong>
                                Jasa/Barang
                            </strong>
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-grey">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" width="5%">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga (Rp)</th>
                                        <th scope="col">Sub Total (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataDetail as $dt)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $dt->nama }}</td>
                                            <td>{{ $dt->jumlah }}</td>
                                            <td class="text-right">{{ number_format($dt->harga) }}</td>
                                            <td class="text-right">{{ number_format($dt->sub_total) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4">Total (Rp)</th>
                                        <td class="text-right">{{ number_format($dataServis->total_biaya) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ url('/servis') }}" class="btn btn-danger btn-round"><span
                                    class="btn-label mr-2"><i class="fa fa-arrow-circle-left"></i></span>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
