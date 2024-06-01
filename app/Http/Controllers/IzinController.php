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
            'file_izin' => 'required|file|mimes:jpg,png|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('file_izin')) {
            $file = $request->file('file_izin');
            $filename = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/izin', $filename, 'public');
            
            $izin = new Izin();
            $izin->id_user = $user->id;
            $izin->file_izin = '/storage/' . $filePath;
            $izin->status = 0; // default status
            $izin->tgl = now();
            $izin->save();

            return redirect()->route('create-izin')->with('success', 'Surat izin berhasil diupload.');
        }

        return back()->withErrors(['file_izin' => 'File upload failed.']);
    }
}
