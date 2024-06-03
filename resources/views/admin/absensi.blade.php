@extends('admin.home')
@section('title', 'Presensi')
@section('isi')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Presensi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
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
                <tbody>
                    @foreach ($absensiRecords as $absensi)
                    <tr>
                        <td>{{ $absensi->tanggal }}</td>
                        <td>{{ $absensi->user->nama }}</td>
                        <td>{{ $absensi->alpha }}</td>
                        <td>{{ $absensi->sakit }}</td>
                        <td>{{ $absensi->jam_kedatangan }}</td>
                        <td>{{ $absensi->jam_pulang }}</td>
                        <td>{{ $absensi->jam_perhari }}</td>
                        <td>{{ $absensi->status_lembur === '0' ? 'Tidak Lembur' : 'Lembur' }}</td>
                        <td>{{ $absensi->jam_lembur }}</td>
                        <td>
                            <a href="/edit_presensi/{{ $absensi->id_absensi }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
