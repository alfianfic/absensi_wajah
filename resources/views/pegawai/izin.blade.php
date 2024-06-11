@extends('master')
@section('title', 'Izin')
@section('isi')


<!-- Modal for File Upload -->
{{-- <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/uploadIzin" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->nik }}">
                    <div class="form-group">
                        <label for="file">Pilih File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<div class="container">
    <h1>Upload Surat Izin</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store-izin') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file_izin">Upload Surat Izin (jpg, png)</label>
            <input type="file" class="form-control" id="file_izin" name="file_izin" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Surat Perizinan</h1> --}}
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Surat Perizinan</h6> --}}
                {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload File</button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>File Izin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users  as $user)
                            <tr>
                                <th>{{ $user->tgl }}</th>
                                <th><a href="{{ asset($user->file_izin) }}" target="_blank">Lihat Surat</a></th>
                                <th>{{ $user->status == 1 ? 'terverifikasi':'belum terverifikasi' }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
