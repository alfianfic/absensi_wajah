<H1>Login</H1>
@if(session()->has('loginError'))
    {{session('loginError')}}
@endif

<form action="/login" method="post">
    @csrf
    <input type="text" name="nik" placeholder="nik" required autofocus value="{{old('nik')}}">
    @error('nik')
        {{ $message }}
    @enderror
    <br>
    <input type="password" name="password" placeholder="password" required>
    @error('password')
        {{ $message }}
    @enderror
    <br>
    <button type="submit">Login</button>
</form>