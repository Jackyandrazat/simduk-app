<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\perangkat;
use App\Models\perangkatRT;
use Illuminate\Http\Request;

class perangkatRTConntroller extends Controller
{
    //
    public function index()
    {
        return view('admin.rt.rt', [
            'rts' => perangkat::all()
        ]);
    }

    public function create()
    {
        return view('admin.rt.create', [
            'wargas' => Warga::all()

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'jabatan' => 'required',
            'tanggal_diangkat' => 'required',
            'tanggal_selesai' => 'required',
            'keterangan' => 'required'

        ]);

        // dd($validatedData);
        perangkat::create($validatedData);
        return redirect('/rt')->with('success', 'Data berhasil disimpan');
    }

    public function edit(perangkat $rt)
    {
        return view('admin.rt.edit', [
            'rt' => $rt,
            'wargas' => Warga::all()
        ]);
    }
    public function update(Request $request, perangkat $rt)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'jabatan' => 'required',
            'tanggal_diangkat' => 'required',
            'tanggal_selesai' => 'required',
            'keterangan' => 'required'
        ]);
        // dd($validatedData);
        perangkat::where('id', $rt->id)->update($validatedData);
        return redirect('/rt');
    }
    public function destroy(perangkat $rt)
    {
        perangkat::destroy($rt->id);
        return redirect('/rt')->with('pesan', 'Data Berhasil Dihapus');
    }
}
