@extends('admin.home')
@section('title','Absensi')
@section('isi')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absensi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Alpha</th>
                        <th>Sakit</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Jam Kerja</th>
                        <th>Status Lembur</th>
                        <th>Jam Lembur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Alpha</th>
                        <th>Sakit</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Jam Kerja</th>
                        <th>Status Lembur</th>
                        <th>Jam Lembur</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>
@endsection