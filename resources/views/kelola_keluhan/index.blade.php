@extends('../layout.template')
@section('title', 'Kelola Data Keluhan')

@section('content')

    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif (Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class=" display table table-striped table-bordered " cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No.</th>
                                    <th>No. Pengaduan</th>
                                    <th>Nama</th>
                                    <th>No. Telp</th>
                                    <th>Pengaduan</th>
                                    <th>Status</th>
                                    <th style="width: 20%">Aksi</th>
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
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_tlp }}</td>
                                        <td>{{ $item->pengaduan }}</td>
                                        {{-- <td>
                                            <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank">Lihat</a>
                                            
                                        </td> --}}
                                        <td>
                                            @if ($item->status == 'Open')
                                                <a href="#" class="badge badge-success status-keluhan "
                                                    data-id="{{ $item->id_keluhan }}"
                                                    data-nama=" {{ $item->nama }}">{{ $item->status }}</a>
                                            @else
                                                <a href="#" class="badge badge-danger status-keluhan"
                                                    data-id="{{ $item->id_keluhan }}"
                                                    data-nama=" {{ $item->nama }}">{{ $item->status }}</a>
                                            @endif
                                        </td>
                                        <td>
                                                <a href="{{ route('tindak_lanjut.buat' , $item->id_keluhan) }}"
                                                    class="btn btn-xs btn-primary btn-round"> <i
                                                        class="fa fa-plus mr-2"></i>Tanggapan
                                                </a>
                                            <a href="{{ url('keluhan/' . $item->id_keluhan) }}"
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.status').click(function() {
            var dataid = $(this).attr('data-id');
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

@endsection
