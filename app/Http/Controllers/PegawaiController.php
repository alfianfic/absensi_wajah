<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function beranda()
    {
        $user = Auth::user();
        $hehe = $user->id;
        $totalabsen = DB::table('absensi')
        ->where('id_user', $hehe)
        ->whereMonth('tanggal', now()->month)
        ->whereYear('tanggal', now()->year)
        ->count();

        $sakit = DB::table('absensi')
        ->where('id_user', $hehe)
        ->where('sakit', '<>',0)
        ->whereMonth('tanggal', now()->month)
        ->whereYear('tanggal', now()->year)
        ->count();

        return view('pegawai.home',[
            'totalabsen' => $totalabsen,
            'sakit' => $sakit,
        ]);
    }
    public function absensi()
    {
        return view('pegawai.absen');
    }
    public function gaji()
    {
        $user = Auth::user();

        $hehe = $user->id;
        $users = DB::select("select * from gaji where id_user=$hehe");
        // $users = DB::select("select * from gaji ");
        return view('pegawai.gaji',[
            'users' => $users
        ]);
    }
    public function izin()
    {
        $users = DB::select('select * from izin');
        return view('pegawai.izin',[
            'users' => $users,
        ]);
    }
}
