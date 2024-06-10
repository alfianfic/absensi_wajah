@extends('admin.home')
@section('title','Profil')
@section('isi')

<div class="container mt-5">
    <h1 class="mb-4">PROFIL</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group row">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nik" name="nik" value="{{ auth()->user()->nik }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->nama }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" {{ auth()->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ auth()->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="alamat" name="alamat">{{ auth()->user()->alamat }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ auth()->user()->no_hp }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>

@endsection
