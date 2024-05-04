@extends('admin.home')
@section('title','Karyawan')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                        <!-- Tambahan tombol untuk menyisipkan data -->
                        <div class="float-right">
                            <a href="/tambah_karyawan" class="btn btn-success btn-sm">Tambah Karyawan</a>
                        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Authentifikasi Wajah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Authentifikasi Wajah</th>
                            <th>Action</th>
                        </tr>
                    <tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection