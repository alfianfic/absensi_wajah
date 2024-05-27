@extends('admin.home')
@section('title','Tambah Karyawan')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Karyawan</h1>

    <!-- Form untuk tambah karyawan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tambah_karyawan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
                <div class="form-group">
                    <label for="authentifikasi_wajah">Authentifikasi Wajah:</label>
                    <input type="file" class="form-control-file" id="authentifikasi_wajah" name="authentifikasi_wajah">
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="1">Admin</option>
                        <option value="2">Pemilik</option>
                        <option value="3">Pegawai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Kerja:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja1" value="1" checked>
                        <label class="form-check-label" for="status_kerja1">
                            Bekerja
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bekerja" id="status_kerja2" value="0">
                        <label class="form-check-label" for="status_kerja2">
                            Tidak Bekerja
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shift">Shift:</label>
                    <select class="form-control" id="shift" name="shift" required>
                        <option value="P">Shift 1</option>
                        <option value="M">Shift 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
