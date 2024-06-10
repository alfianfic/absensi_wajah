@extends('admin.home')
@section('title', 'Karyawan')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (auth()->user()->role==2)
            @else
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
            <a href="/tambah_karyawan" class="btn btn-success btn-sm">Tambah Karyawan</a>
        </div>
        @endif
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
                            {{-- <th>Authentifikasi Wajah</th> --}}
                            <th>Role</th>
                            <th>Status</th>
                            <th>Shift</th>
                            @if (auth()->user()->role==2)
                            @else
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $employee)
                        <tr>
                            <td>{{ $employee->nik }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                            <td>{{ $employee->alamat }}</td>
                            <td>{{ $employee->no_hp }}</td>
                            {{-- <td>{{ $employee->autentikasi_wajah ? 'Enabled' : 'Disabled' }}</td> --}}
                            <td>
                            @if ($employee->role == 1)
                                Admin
                            @elseif ($employee->role ==2)
                                Owner
                            @elseif ($employee->role ==3)
                                Pegawai
                            @else
                                I don't have any records!
                            @endif
                            </td>
                            <td>{{ $employee->bekerja ? 'Aktif' : 'Off' }}</td>
                            <td>{{ $employee->shift == 'P' ? 'Pagi' : 'Malam    ' }}</td>
                            @if (auth()->user()->role==2)
                            @else
                            <td>
                                <a href="/edit_karyawan/{{ $employee->id }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/delete_karyawan/{{ $employee->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
