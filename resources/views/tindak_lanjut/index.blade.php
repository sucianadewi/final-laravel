@extends('../layout.template')
@section('title', 'Kelola Data Tanggapan Keluhan')

@section('content')

    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class=" display table table-striped table-bordered " cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No.</th>
                                    <th>No. Pengaduan</th>
                                    <th style="width: 15%">Tgl. Penanganan</th>
                                    <th>Keterangan</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($sorted as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->no_keluhan }}</td>
                                        @if ($item->id_tindak_lanjut == ' ')
                                            <td>-</td>
                                            <td>-</td>
                                        @else
                                            <td>{{ date('d-m-Y', strtotime($item->tgl_penanganan)) }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                        @endif

                                        <td>

                                            <a href="{{ url('tindak_lanjut/' . $item->id_tindak_lanjut . '/edit') }}"
                                                class="btn btn-xs btn-warning btn-round"> <i class="far fa-edit mr-2"></i>Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection
