@extends('master')
@section('title','Gaji')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gaji</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gaji Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bulan / Tahun</th>
                            <th>Total Presensi</th>
                            <th>Nominal</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users  as $user)
                        <tr>
                            <th>{{ $user->bulan }} / {{ $user->tahun }}</th>
                            <th>{{ $user->jam_kerja_bulan }} Jam / Bulan</th>
                            <th>Rp {{ number_format($user->total_gaji , 0, ',', '.')}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>Bulan</th>
                        <th>Total Presensi</th>
                        <th>Nominal</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
