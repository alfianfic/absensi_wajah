<!-- resources/views/admin/edit_presensi.blade.php -->
@extends('admin.home')
@section('title', 'Edit Presensi')
@section('isi')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Presensi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('updatepresensi', $absensi->id_absensi) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
            </div>
            <div class="form-group">
                <label for="alpha">Alpha</label>
                <input type="number" name="alpha" class="form-control" value="{{ $absensi->alpha }}" required>
            </div>
            <div class="form-group">
                <label for="sakit">Sakit</label>
                <input type="number" name="sakit" class="form-control" value="{{ $absensi->sakit }}" required>
            </div>
            <div class="form-group">
                <label for="jam_kedatangan">Jam Kedatangan</label>
                <input type="time" name="jam_kedatangan" class="form-control" value="{{ $absensi->jam_kedatangan }}" required>
            </div>
            <div class="form-group">
                <label for="jam_pulang">Jam Pulang</label>
                <input type="time" name="jam_pulang" class="form-control" value="{{ $absensi->jam_pulang }}" required>
            </div>
            <div class="form-group">
                <label for="jam_perhari">Jam Kerja</label>
                <input type="number" name="jam_perhari" class="form-control" value="{{ $absensi->jam_perhari }}" required>
            </div>
            <div class="form-group">
                <label for="status_lembur">Status Lembur</label>
                <select name="status_lembur" class="form-control" required>
                    <option value="0" {{ $absensi->status_lembur == '0' ? 'selected' : '' }}>Tidak Lembur</option>
                    <option value="1" {{ $absensi->status_lembur == '1' ? 'selected' : '' }}>Lembur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam_lembur">Jam Lembur</label>
                <input type="number" name="jam_lembur" class="form-control" value="{{ $absensi->jam_lembur }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
