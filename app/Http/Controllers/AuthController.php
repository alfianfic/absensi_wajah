<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function auth(Request $request)
    {
        $credential = $request->validate([
            'nik'=>'required',
            'password'=>'required'
        ]);

        if(Auth::Attempt($credential)){
            if (Auth::user()->role == 1){
                $request->session()->regenerate();
                return redirect("/dashboard");
            }
            elseif (Auth::user()->role == 2 ){
                $request->session()->regenerate();
                return redirect("/dashboard");
            }
            elseif (Auth::user()->role == 3 ){
                $request->session()->regenerate();
                return redirect("/karyawan");
            }
        }

        return back()->with('loginError', 'Belum Berhasil, nih!');
    }
}
