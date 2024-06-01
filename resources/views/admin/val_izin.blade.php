@extends('admin.home')
@section('title','Validasi')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Surat Validasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Validasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Surat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinList as $izin)
                        <tr>
                            <td>{{ $izin->user->nama }}</td>
                            <td>
                                <a href="{{ asset($izin->file_izin) }}" target="_blank">Lihat Surat</a>
                            </td>
                            <td>
                                <form action="{{ route('validasiIzin', $izin->id_izin) }}" method="post">
                                    @csrf
                                    <button type="submit" name="status" value="1" class="btn btn-success">Validasi</button>
                                    <button type="submit" name="status" value="0" class="btn btn-danger">Tolak</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
