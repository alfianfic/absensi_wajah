@extends('admin.home')
@section('title','Edit Karyawan')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Karyawan</h1>

    <!-- Form untuk tambah karyawan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" class="form-control" id="nik" name="nik">
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Hp:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
                <div class="form-group">
                    <label for="authentifikasi_wajah">Authentifikasi Wajah:</label>
                    <input type="file" class="form-control-file" id="authentifikasi_wajah" name="authentifikasi_wajah">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
