@extends('../layout.template')
@section('title', 'Kelola Data Penguna')
@include('sweetalert::alert')

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
                    <div class="d-flex align-items-center mb-5">

                        <a href="{{ url('pengguna/create') }}" class="btn btn-primary btn-round ml-auto"> <i
                                class=" fa fa-plus"></i>
                            Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class=" display table table-striped table-bordered " cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($sorted as $item => $dt)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>{{ $dt->email }}</td>
                                        <td>{{ $dt->no_tlp }}</td>
                                        <td>{{ $dt->alamat }}</td>
                                        <td>{{ $dt->role }}</td>
                                        <td>
                                            @if ($dt->status == 'Aktif')
                                                <a href="#" class="badge badge-success status-user "
                                                    data-id="{{ $dt->id_user }}"
                                                    data-nama=" {{ $dt->nama }}">{{ $dt->status }}</a>
                                            @else
                                                <a href="#" class="badge badge-danger status-user"
                                                    data-id="{{ $dt->id_user }}"
                                                    data-nama=" {{ $dt->nama }}">{{ $dt->status }}</a>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ url('pengguna/' . $dt->id_user . '/edit') }}"
                                                class="btn btn-warning btn-xs btn-round"> <i
                                                    class="far fa-edit mr-2"></i>Edit
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.status').click(function() {
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

@endsection
