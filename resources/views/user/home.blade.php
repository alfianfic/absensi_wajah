@extends('master')
@section('title','Home')
@section('isi')
</br>
@auth
Selamat Datang {{auth()->user()->nik}}
</br>
<form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
</br>
@else
<a href="/login">login</a>
</br>
@endauth
@endsection