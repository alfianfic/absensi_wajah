@extends('admin.home')
@section('title','Edit Karyawan')
@section('isi')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Karyawan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('update_karyawan', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $karyawan->nik) }}" required>
                    @error('nik')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}" required>
                    @error('nama')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $karyawan->alamat) }}</textarea>
                    @error('alamat')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $karyawan->no_hp) }}">
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
                        <option value="1" {{ old('role', $karyawan->role) == '1' ? 'selected' : '' }}>Admin</option>
                        {{-- <option value="2" {{ old('role', $karyawan->role) == '2' ? 'selected' : '' }}>Pemilik</option> --}}
                        <option value="3" {{ old('role', $karyawan->role) == '3' ? 'selected' : '' }}>Pegawai</option>
                    </select>
                    @error('role')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status Kerja:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja1" value="1" {{ old('bekerja', $karyawan->bekerja) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_kerja1">
                            Bekerja
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja2" value="0" {{ old('bekerja', $karyawan->bekerja) == '0' ? 'checked' : '' }}>
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
                        <option value="P" {{ old('shift') }}>Shift 1</option>
                        <option value="M" {{ old('shift') }}>Shift 2</option>
                    </select>
                    @error('shift')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="password">(Kosongkan jika tidak ingin mengubah):</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection
