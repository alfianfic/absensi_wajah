@extends('master')
@section('title','Tambah Karyawan')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Presensi</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Form untuk tambah karyawan -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tambah_karyawan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">Foto:</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" required>
                    @error('nik')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Tanggal:</label>
                    <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="authentifikasi_wajah">Authentifikasi Wajah:</label>
                    <input type="file" class="form-control-file" id="authentifikasi_wajah" name="authentifikasi_wajah">
                    @error('authentifikasi_wajah')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Pemilik</option>
                        <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Pegawai</option>
                    </select>
                    @error('role')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status Kerja:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja1" value="1" {{ old('bekerja') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_kerja1">
                            Bekerja
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja2" value="0" {{ old('bekerja') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_kerja2">
                            Tidak Bekerja
                        </label>
                    </div>
                    @error('bekerja')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="shift">Shift:</label>
                    <select class="form-control" id="shift" name="shift" required>
                        <option value="1" {{ old('shift') == '1' ? 'selected' : '' }}>Shift 1</option>
                        <option value="2" {{ old('shift') == '2' ? 'selected' : '' }}>Shift 2</option>
                    </select>
                    @error('shift')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
