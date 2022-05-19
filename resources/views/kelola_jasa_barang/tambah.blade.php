@extends('../layout.template')
@section('title', 'Menambahkan Data Jasa & Barang')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('jasa') }}" method="POST">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="kode">Kode </label>
                            <input type="text" id="kode" name="kode"
                                class="form-control input-pill @error('kode') is-invalid @enderror"
                                value="{{ $model->kode }}" required autofocus>
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control input-pill @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" id="stok" name="stok"
                                class="form-control input-pill @error('stok') is-invalid @enderror"
                                value="{{ old('stok') }}" required>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" id="harga" name="harga"
                                class="form-control input-pill @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}" required>
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-4 text-right">
                            <a href="{{ url('jasa') }}" class="btn btn-danger btn-round"><span class="btn-label mr-2"><i
                                        class="fa fa-arrow-circle-left"></i></span>Kembali</a>
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
