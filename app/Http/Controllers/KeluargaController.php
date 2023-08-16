<?php

namespace App\Http\Controllers;


use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warga;

class KeluargaController extends Controller
{
    //
    public function index()
    {
        return view('admin.keluarga.keluarga',[
            'keluargas'=>Keluarga::all()
        ]);
    }

    public function edit(Keluarga $keluarga)
    {
        return view('admin.keluarga.edit', [
            'keluarga' => $keluarga,
            'wargas' => Warga::all()
        ]);
    }

    public function create()
    {
        return view('admin.keluarga.create',[
            'wargas' => Warga::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'no_kk' => 'required|unique:keluargas|max:16',
            'nama_keluarga' => 'required',
            'nik' => 'required',
        ]);

        // dd($validatedData);
        Keluarga::create($validatedData);
        return redirect('/keluarga')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $validatedData=$request->validate([
            'no_kk' => 'required||max:16',
            'nama_keluarga' => 'required',
            'nik' => 'required',
        ]);
        // dd($validatedData);
        Keluarga::where('id', $keluarga->id)->update($validatedData);
        return redirect('/keluarga');
    }

    public function destroy(Keluarga $keluarga)
    {
        Keluarga::destroy($keluarga->id);
        return redirect('/keluarga')->with('pesan','Data Berhasil Dihapus');
    }

    
}
