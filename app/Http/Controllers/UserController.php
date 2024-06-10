<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan untuk mengimpor model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function test()
    {
        return view('user.test');
    }

    public function profil()
    {
        return view('user.profil');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:14',
        ]);

        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui');
    }

    public function jadwal()
    {
        return view('user.jadwal');
    }
}
