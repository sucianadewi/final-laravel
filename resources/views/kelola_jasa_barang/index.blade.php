@extends('../layout.template')
@section('title', 'Kelola Data Jasa & Barang')

@section('content')

    {{-- {{ dd($jasa) }} --}}
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

                        <a href="{{ url('jasa/create') }}" class="btn btn-primary btn-round ml-auto"> <i
                                class=" fa fa-plus"></i>
                            Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class=" display table table-striped table-bordered " cellspacing="0"
                            width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10%">No.</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Harga (Rp)</th>
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
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->stok }}</td>
                                        <td class="text-right"> {{ number_format($item->harga) }}</td>
                                        <td>
                                            <a href="{{ url('jasa/' . $item->id_jasa_barang . '/edit') }}"
                                                class="btn btn-xs btn-warning btn-round"> <i
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
    </div>


    {{-- <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Add Row</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Add Row
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    New</span>
                                <span class="fw-light">
                                    Row
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input id="addPosition" type="text" class="form-control"
                                                placeholder="fill position">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Office</label>
                                            <input id="addOffice" type="text" class="form-control"
                                                placeholder="fill office">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title=""
                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                        data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title=""
                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                        data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}

@endsection
