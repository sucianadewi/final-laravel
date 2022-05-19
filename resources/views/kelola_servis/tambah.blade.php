@extends('../layout.template')
@section('title', 'Menambahkan Data Servis')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <form action="{{ url('servis') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="tgl_servis" class="col-sm-2 col-form-label">Tanggal Servis </label>
                            <div class="col-sm-10">
                                <input type="date" id="tgl_servis" name="tgl_servis"
                                    class="form-control input-pill @error('tgl_servis') is-invalid @enderror"
                                    value="{{ old('tgl_servis') }}" required autofocus>
                                @error('tgl_servis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama_pemilik" name="nama_pemilik"
                                    class="form-control input-pill @error('nama_pemilik') is-invalid @enderror"
                                    value="{{ old('nama_pemilik') }}" placeholder="Masukkan Nama Pemilik..." required>
                                @error('nama_pemilik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tlp" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="number" id="no_tlp" name="no_tlp"
                                    class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                    value="{{ old('no_tlp') }}" placeholder="Masukkan No. Telepon Pemilik..." required>
                                @error('no_tlp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="no_polisi" class="col-sm-2 col-form-label">No. Polisi</label>
                            <div class="col-sm-10">
                                <input type="text" id="no_polisi" name="no_polisi"
                                    class="form-control input-pill @error('no_polisi') is-invalid @enderror"
                                    value="{{ old('no_polisi') }}" placeholder="Masukkan No. Polisi..." required>
                                @error('no_polisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_motor" class="col-sm-2 col-form-label">Tipe Motor</label>
                            <div class="col-sm-10">
                                <input type="text" id="tipe_motor" name="tipe_motor"
                                    class="form-control input-pill @error('tipe_motor') is-invalid @enderror"
                                    value="{{ old('tipe_motor') }}" placeholder="Masukkan Tipe Motor..." required>
                                @error('tipe_motor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id=" keterangan" name="keterangan"
                                    class="form-control input-pill @error('keterangan') is-invalid @enderror"
                                    placeholder="Masukkan Keterangan..." value="{{ old('keterangan') }}"
                                    required></textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-header mt-4">
                            <h2><strong>
                                    Jasa/Barang</h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_jasa_barang">Nama</label>
                                <select id="id_jasa_barang"
                                    class="form-control input-pill @error('id_jasa_barang') is-invalid @enderror"
                                    name="id_jasa_barang[]">
                                    <option value="">-Plih-</option>
                                    @foreach ($jasaBarang as $item)
                                        <option value="{{ $item->id_jasa_barang }}"
                                            {{ old('id_jasa_barang') == $item->id_jasa_barang ? 'selected' : null }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_jasa_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jumlah">Jumlah </label>

                                <input type="number" id="jumlah" name="jumlah[]"
                                    class="form-control input-pill @error('jumlah') is-invalid @enderror"
                                    value="{{ old('jumlah') }}" placeholder="Masukkan Jumlah Jasa/Barang..." required>
                                @error('jumlah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <label for="tambah"></label>
                                <div class="col-sm-10 text-right">
                                    <a href="#" class="addjasa btn btn-secondary btn-round"><i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="jasa"></div>

                        <div class="form-group mt-4 text-right">
                            <button type="submit" class="btn btn-info btn-round btn-block"><i
                                    class="fa fa-save mr-2"></i>Simpan</button>
                            {{-- <a href="{{ url('servis') }}" class="btn btn-danger btn-round"><span class="btn-label mr-2"><i
                                        class="fa fa-arrow-circle-left"></i></span>Kembali</a>
                            <button type="submit" class="btn btn-info btn-round"><i class="fa fa-save mr-2"></i>
                                Simpan</button> --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    {{-- <script>
        function autofill() {
            var id_jasa_barang = $("#id_jasa_barang").val();
            alert(id_jasa_barang);
        }
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addjasa').on('click', function() {
            addjasa();
        });

        function addjasa() {
            var jasa =
                '<div class="mt-4"><div class="form-row"><div class = "form-group col-md-6" ><label for = "id_jasa_barang" > Nama </label> <select id = "id_jasa_barang"class = "form-control input-pill @error('id_jasa_barang') is-invalid @enderror" name = "id_jasa_barang[]" onkeyup = "autofill()" ><option @foreach ($jasaBarang as $item)<option value="{{ $item->id_jasa_barang }}"{{ old('id_jasa_barang') == $item->id_jasa_barang ? 'selected' : null }}>{{ $item->nama }}</option>@endforeach</select>@error('id_jasa_barang')<div class="invalid-feedback">{{ $message }}</div>@enderror</div> <div class = "form-group col-md-4"><label for = "jumlah" > Jumlah  </label><input type = "number" id = "jumlah" name = "jumlah[]" class = "form-control input-pill @error('jumlah') is-invalid @enderror" id = "pillInput" value = "{{ old('jumlah') }}"placeholder = "Masukkan Jumlah Jasa/Barang..." required >@error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror </div><div class="form-group col-md-1"><label for="tambah"></label><div class="col-sm-10 text-right"><a href="#" class="remove btn btn-danger btn-round"><i class="fas fa-times"></i></a></div></div></div ></div> ';

            $('.jasa').append(jasa);
        };

        $('.remove').live('click', function() {
            $(this).parent().parent().parent().remove();
        });
    </script>
@endsection
