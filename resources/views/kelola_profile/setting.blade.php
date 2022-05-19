@extends('../layout.template')
@section('title', 'Pengaturan')

@section('content')
    <div class="row">
        <div class="col-md-4" style="border-radius: 2px;">
            <div class="card card-profile">
                <div class="card-header"
                    style="background-image: url('https://images.pexels.com/photos/10981498/pexels-photo-10981498.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'); height:250px;">
                    <div class="profile-picture">
                        @if (Auth::user()->foto)
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                        @else
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('foto') }}/profile/profile.png" alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ Auth::user()->nama }}</div>
                        <div class="job">{{ Auth::user()->role }}</div>
                        <div class="desc">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                {{-- <ul class="nav nav-tabs " id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button style="width: 395px;" class="nav-link active btn-lg btn-block" id="profile-tab"
                            data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">
                            <strong>
                                Ubah Profil</strong></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="width: 397px;" class="nav-link btn-lg btn-block" id="password-tab"
                            data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab"
                            aria-controls="password" aria-selected="false">
                            <strong>
                                Ubah Password</strong></button>
                    </li>
                </ul> --}}
                {{-- <div class="tab-content p-3" id="myTabContent"> --}}
                    
                    {{-- <div class="tab-pane fade show profile active" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab"> --}}
                        <div class="card-body">
                            @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                            <form action="{{ url('profile/' . Auth::user()->id_user) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama </label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control input-pill @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', Auth::user()->nama) }}" autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat"
                                        class="form-control input-pill @error('alamat') is-invalid @enderror"
                                        value="{{ old('alamat', Auth::user()->alamat) }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp">No. Telepon</label>
                                    <input type="text" id="no_tlp" name="no_tlp"
                                        class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                        value="{{ old('no_tlp', Auth::user()->no_tlp) }}">
                                    @error('no_tlp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email"
                                        class="form-control input-pill @error('email') is-invalid @enderror"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="hidden" name="oldImage" value="{{ Auth::user()->foto }}">

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
                                        class="form-control input-pill" value="{{ Auth::user()->password }}">
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
                                    <button type="submit" class="btn btn-info btn-round"><i class="fa fa-edit mr-1"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <div class="card-body ">

                            <hr>
                            <form action="{{ url('profile/edit_password/' . Auth::user()->id_user) }}" method="POST">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control input-pill @error('password') is-invalid @enderror"
                                        placeholder="Masukkan password baru..." autofocus>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control input-pill @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Konfirmasi password baru...">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group text-right mt-5">
                                    <button type="submit" class="btn btn-info btn-round"><i class="fa fa-edit mr-1"></i>
                                        Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card">
                <div class="card-body">
                    <form action="{{ url('pengguna/' . $model->id_user) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username"
                                class="form-control input-pill @error('username') is-invalid @enderror"
                                value="{{ old('username', $model->username) }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                                <option value="">--Pilih Role--</option>
                                @foreach ($role as $role)
                                    <option value="{{ $role }}" {{ $role == $model->role ? 'selected' : null }}>
                                        {{ $role }}</option>
                                @endforeach

                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Profile</label>
                            <input type="hidden" name="oldImage" value="{{ $model->foto }}">
                            @if ($model->foto)
                                <img src="{{ asset('storage/' . $model->foto) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-5 col-sm-5">
                            @endif
                            <input class="form-control" type="file"
                                class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto"
                                onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right mt-5">
                            <button type="submit" class="btn btn-info btn-round"><i class="fa fa-edit mr-1"></i>
                                Ubah Profie</button>
                        </div>

                    </form>


                </div>
                <hr>


            </div>
            <div class="card">
                <div class="card-body bg-light">
                    <h3><strong>
                            Ubah Password</strong></h3>
                    <hr>
                    <form action="{{ url('pengguna/edit_password/' . $model->id_user) }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control input-pill @error('password') is-invalid @enderror"
                                placeholder="Masukkan password baru...">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control input-pill @error('password_confirmation') is-invalid @enderror"
                                placeholder="Konfirmasi password baru...">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group text-right mt-5">
                            <button type="submit" class="btn btn-info btn-round"><i class="fa fa-edit mr-1"></i>
                                Ubah Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        
        {{-- <div class="row row-card-no-pd">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{ url('profile/' . Auth::user()->id_user) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama </label>
                            <input type="text" id="nama" name="nama"
                                class="form-control input-pill @error('nama') is-invalid @enderror"
                                value="{{ old('nama', Auth::user()->nama) }}" autofocus>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                class="form-control input-pill @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat', Auth::user()->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">No. Telepon</label>
                            <input type="text" id="no_tlp" name="no_tlp"
                                class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                value="{{ old('no_tlp', Auth::user()->no_tlp) }}">
                            @error('no_tlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control input-pill @error('email') is-invalid @enderror"
                                value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Profile</label>
                            <input type="hidden" name="oldImage" value="{{ Auth::user()->foto }}">
                            @if (Auth::user()->foto)
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                    class="img-preview img-fluid mb-3 col-sm-2 d-block">
                            @else
                                <img class="img-preview img-fluid mb-5 col-sm-2">
                            @endif
                            <input class="form-control" type="file"
                                class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto"
                                onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-5 text-center">
                            <button type="submit" class="btn btn-info btn-round "><i
                                    class="fa fa-save mr-2"></i>Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
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
