@extends('../layout.template')

@section('title', 'Ubah Data Pengguna')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                            <form action="{{ url('pengguna/' . $model->id_user) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama </label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control input-pill @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $model->nama) }}" autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat"
                                        class="form-control input-pill @error('alamat') is-invalid @enderror"
                                        value="{{ old('alamat', $model->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp">No. Telepon</label>
                                    <input type="text" id="no_tlp" name="no_tlp"
                                        class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                        value="{{ old('no_tlp', $model->no_tlp) }}">
                                    @error('no_tlp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email"
                                        class="form-control input-pill @error('email') is-invalid @enderror"
                                        value="{{ old('email', $model->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                        <option value="">--Pilih Role--</option>
                                        @foreach ($role as $role)
                                            <option value="{{ $role }}"
                                                {{ $role == $model->role ? 'selected' : null }}>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="hidden" name="oldImage" value="{{ $model->foto }}">
                                    <input type="file"
                                        class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="password_lama" name="password_lama"
                                        class="form-control input-pill" value="{{ $model->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control input-pill @error('password') is-invalid @enderror"
                                        placeholder="Kosongkan jika tidak ingin mengganti password!" >
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group text-right mt-5">
                                    <a href="{{ url('pengguna') }}" class="btn btn-danger btn-round"><span
                                            class="btn-label mr-2"><i class="fa fa-arrow-circle-left"></i></span>Kembali</a>
                                    <button type="submit" class="btn btn-info btn-round"><i class="fa fa-edit mr-1"></i>
                                        Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvenet.target.result;
            }
        }
    </script>

@endsection
