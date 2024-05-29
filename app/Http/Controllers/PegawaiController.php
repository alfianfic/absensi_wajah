<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function beranda()
    {
        return view('pegawai.home');
    }
    public function izin()
    {
        $users = DB::select('select * from IZIN');
        return view('pegawai.izin',[
            'users' => $users,
        ]);
    }
    public function uploadIzin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName);

        DB::table('izin')->insert([
            'id_user' => $request->id_user,
            'file_izin' => $fileName,
            'tgl' => now()
        ]);
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
