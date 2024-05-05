@extends('master')
@section('title','Profil')
@section('isi')

<h1>PROFIL KARYAWAN</h1>

{{auth()->user()->nik}}
</br>
{{auth()->user()->nama}}
</br>
{{auth()->user()->jenis_kelamin}}
</br>
{{auth()->user()->alamat}}
</br>
{{auth()->user()->no_hp}}
</br>

@endsection