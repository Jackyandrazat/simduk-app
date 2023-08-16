<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Kendaraan;
use App\Models\Warga;

class KendaraanController extends Controller
{
    //
     //
     public function index()
     {
         return view('admin.kendaraan.kendaraan',[
            'kendaraans'=>Kendaraan::all()
        ]);
     }

     public function create()
     {
         return view('admin.kendaraan.create',[
             'wargas' => Warga::all()

         ]);
     }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nik' => 'required',
            'nama_kendaraan' => 'required',
            'no_plat' => 'required',
        ]);

        // dd($validatedData);
        Kendaraan::create($validatedData);
        return redirect('/kendaraan')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.edit', [
            'kendaraan' => $kendaraan,
            'wargas' => Warga::all()
        ]);
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validatedData=$request->validate([
            'nik' => 'required',
            'nama_kendaraan' => 'required',
            'no_plat' => 'required',
        ]);
        // dd($validatedData);
        Kendaraan::where('id', $kendaraan->id)->update($validatedData);
        return redirect('/kendaraan');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        Kendaraan::destroy($kendaraan->id);
        return redirect('/kendaraan')->with('pesan','Data Berhasil Dihapus');
    }

}
