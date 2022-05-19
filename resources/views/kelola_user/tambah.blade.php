@extends('../layout.template')

@section('title', 'Tambah Data Pengguna')

@section('content')
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('pengguna') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama </label>
                            <input type="text" id="nama" name="nama"
                                class="form-control input-pill @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" placeholder="Masukkan nama..." autofocus required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                class="form-control input-pill @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat') }}" placeholder="Masukkan alamat..." required>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">No. Telepon</label>
                            <input type="text" id="no_tlp" name="no_tlp"
                                class="form-control input-pill @error('no_tlp') is-invalid @enderror"
                                value="{{ old('no_tlp') }}" placeholder="Masukkan no. telepon..." required>
                            @error('no_tlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email"
                                class="form-control input-pill @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Masukkan email..." required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                                <option value="">--Pilih Role--</option>
                                @foreach ($role as $role)
                                    <option value="{{ $role }}">
                                        {{ $role }}</option>
                                @endforeach

                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"> Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control input-pill @error('password') is-invalid @enderror"
                                placeholder="Masukkan password..." required>
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
@endsection
