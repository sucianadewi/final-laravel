@extends('../layout.template')
@section('title', 'Kelola Data Servis')

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
                    @if (Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="d-flex align-items-center mb-5">

                        <a href="{{ url('servis/create') }}" class="btn btn-primary btn-round ml-auto"> <i
                                class=" fa fa-plus"></i>
                            Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class=" display table table-striped table-bordered " cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 5%">No.</th>
                                    <th style="width: 13%">Tgl. Servis</th>
                                    <th>Nama</th>
                                    <th>No. Telp</th>
                                    <th>No. Polisi</th>
                                    <th>No. Nota</th>
                                    <th>Total (Rp)</th>
                                    <th style="width: 18%">Aksi</th>
                                    {{-- <th>&nbsp;</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($sorted as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tgl_servis)) }}
                                        </td>
                                        <td>{{ $item->nama_pemilik }}</td>
                                        <td>{{ $item->no_tlp }}</td>
                                        <td>{{ $item->no_polisi }}</td>
                                        <td>{{ $item->no_nota }}</td>
                                        <td class="text-right">{{ number_format($item->total_biaya) }}</td>
                                        <td>
                                            <a href="{{ url('servis/' . $item->id_servis . '/edit') }}"
                                                class="btn btn-xs btn-warning btn-round"> <i
                                                    class="far fa-edit mr-2"></i>Edit
                                            </a>
                                            <a href="{{ url('servis/' . $item->id_servis) }}"
                                                class="btn btn-xs btn-info btn-round"> <i class="far fa-eye mr-2"></i>Detail
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
