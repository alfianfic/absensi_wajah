@extends('master')
@section('title','Home')
@section('isi')

sementara tes login sukses
<a href="login">login</a>
<form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

@endsection