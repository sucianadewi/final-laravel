@extends('../layout.template')
@section('title', 'Cetak Laporan Keluhan')

@section('content')
<div>
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    @if (Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                @endif
                    <form action="{{ url('cetak_keluhan/cari') }}" method="GET">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tgl_awal">Tanggal Awal </label>
                                <input type="date" id="tgl_awal" name="tgl_awal" class="form-control input-pill @error('tgl_awal') is-invalid @enderror" value="{{ request('tgl_awal') }}" required
                                    autofocus>
                                    @error('tgl_awal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
    
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tgl_akhir">Tanggal Akhir</label>
                                <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control input-pill @error('tgl_akhir') is-invalid @enderror" value="{{ request('tgl_akhir') }}" required>
                                @error('tgl_akhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-4 col-md-">
                                <button class="btn btn-info btn-round" type="submit"><i class="
                                    flaticon-search-2 mr-2"></i>Search</button>
                                
                            </div>
                            <div class="form-group mt-4 col-md-2">
                                @if (isset($result))
                                <a href="#"
                                onclick="
                                this.href='cetak_pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value"
                                class="btn btn-danger btn-round" type="submit" target="_blank" > <i class="fa fa-file-pdf mr-2"></i> Cetak</a>
                                @endif
                                
                                    {{-- <a type="submit" class="btn btn-info btn-block btn-round" onclick="kirim()">Cetak</a> --}}
                            </div>
                            
                        </div>
                        

                    </form>
                </div>
            </div>
            
        </div>
    </div> 
    </div> </div>
    @if (isset($result))
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                
                {{-- <div class="d-flex align-items-center mb-5">
                    <a href=" " onclick="this.href='cetak_pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value" class="btn btn-info btn-round ml-auto" target="_blank">Cetak</a>
                </div> --}}
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
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($result as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->no_keluhan }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    <td>{{ $item->pengaduan }}</td>
                                    <td>
                                        @if ($item->status == 'Open')
                                            <span class="badge badge-success">{{ $item->status }}</span>
                                        @else
                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
    
    
@endsection
