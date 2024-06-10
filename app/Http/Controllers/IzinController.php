<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function create()
    {
        return view('pegawai.izin');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file_izin' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('file_izin')) {
            $file = $request->file('file_izin');
            $filename = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/izin', $filename, 'public');

            $izin = new Izin();
            $izin->id_user = $user->id;
            $izin->file_izin = 'storage/' . $filePath; // path yang disimpan ke database
            $izin->status = 0; // status default
            $izin->tgl = now();
            $izin->save();

            return redirect()->route('create-izin')->with('success', 'Surat izin berhasil diupload.');
        }

        return back()->withErrors(['file_izin' => 'File upload failed.']);
    }

    public function validasiadmin(Request $request, $id_izin)
    {
        $izin = Izin::find($id_izin);
        if ($izin) {
            $izin->status = $request->input('status');
            $izin->save();
            return redirect()->back()->with('success', 'Status surat izin berhasil diperbarui.');
        }

        return redirect()->back()->withErrors(['error' => 'Surat izin tidak ditemukan.']);
    }
}
