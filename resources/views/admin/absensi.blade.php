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
                <tbody>
                    @foreach ( $users  as $user)
                    {{-- @dd($user->id_user) --}}

                        <tr>
                            <td>foto</td>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->tanggal }}</td>
                            <td>{{ $user->alpha }}</td>
                            <td>{{ $user->sakit }}</td>
                            <td>{{ $user->jam_kedatangan }}</td>
                            <td>{{ $user->jam_pulang }}</td>
                            <td>{{ $user->jam_perhari }}</td>
                            <td>{{ $user->status_lembur }}</td>
                            <td>{{ $user->jam_lembur }}</td>
                            <td>AKSI</td>
                        </tr>
                    @endforeach
                </tbody>
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
