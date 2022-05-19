@extends('../layout.template')
@section('title', 'Menambahkan Tanggapan')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('tindak_lanjut') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="hidden" id="id_keluhan" name="id_keluhan"
                                class="form-control @error('id_keluhan') is-invalid @enderror"
                                value="{{ $idKeluhan->id_keluhan }}">

                        </div>
                        @error('id_keluhan')
                            <div class="invalid-feedback ">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="tgl_penanganan">Tanggal Penanganan </label>
                            <input type="date" id="tgl_penanganan" name="tgl_penanganan"
                                class="form-control input-pill @error('tgl_penanganan') is-invalid @enderror @error('tgl_penanganan') is-invalid @enderror"
                                value="{{ old('tgl_penanganan') }}" required autofocus>
                            @error('tgl_penanganan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id=" keterangan" name="keterangan"
                                class="form-control input-pill @error('tgl_penanganan') is-invalid @enderror @error('keterangan') is-invalid @enderror"
                                placeholder="Masukkan Keterangan..." value="{{ old('keterangan') }}" required></textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-4 text-right">
                            <a href="{{ url('keluhan') }}" class="btn btn-danger btn-round"><span
                                    class="btn-label mr-2"><i class="fa fa-arrow-circle-left"></i></span>Kembali</a>
                            <button type="submit" class="btn btn-info btn-round"><i class="fa fa-save mr-2"></i>
                                Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
