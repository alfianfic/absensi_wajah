<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function beranda()
    {
        return view('pegawai.home');
    }
    public function izin()
    {
        return view('pegawai.izin');
    }
    public function uploadIzin(Request $request)
    {
        $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName);

        return view('pegawai.izin');
    }
    public function absensi()
    {
        return view('pegawai.absen');
    }
    public function gaji()
    {
        return view('pegawai.gaji');
    }
}
