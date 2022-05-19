@extends('../layout.template')
@section('title', 'Mengubah Data Tanggapan')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('tindak_lanjut/' . $model->id_tindak_lanjut) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tgl_penanganan">Tanggal Penanganan </label>
                            <input type="date" id="tgl_penanganan" name="tgl_penanganan"
                                class="form-control input-pill @error('tgl_penanganan') is-invalid @enderror"
                                value="{{ $model->tgl_penanganan }}" required autofocus>
                            @error('tgl_penanganan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" id="keterangan" name="keterangan"
                                class="form-control input-pill @error('keterangan') is-invalid @enderror"
                                required>{{ $model->keterangan }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-4 text-right">
                            <a href="{{ url('tindak_lanjut') }}" class="btn btn-danger btn-round"><span
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
