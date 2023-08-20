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
        $suamiWargas = Warga::where('status_kk', 'suami')->get(['id','nik','nama']);
    
        return view('admin.keluarga.create', [
            'wargas' => $suamiWargas,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'no_kk' => 'required|unique:keluargas|max:16',
            'nama_keluarga' => 'required',
            'nik' => 'required|exists:wargas,id',
        ],[
            'no_kk.required' => 'Kolom harus diisi.',
            'nama_keluarga.required' => 'Kolom harus diisi.',
            'nik.required' => 'Kolom harus diisi.',
            'nik.exists' => 'Data Sudah Ada!'            
        ]);

        // dd($validatedData);
        Keluarga::create($validatedData);
        return redirect('/keluarga')->with('success', 'Data berhasil disimpan');
    }

    public function show(Keluarga $keluarga)
    {
        return view('admin.keluarga.show', [
            'keluarga' => $keluarga,
            'keluargas' => Keluarga::all(),
            'wargas' => Warga::all()

        ]);
    }

    public function checkNoKK(Request $request)
    {
        $kk = $request->input('no_kk');
        $exists = Keluarga::where('no_kk', $kk)->exists();

        return response()->json(['exists' => $exists]);
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
        return redirect('/keluarga')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(Keluarga $keluarga)
    {
        Keluarga::destroy($keluarga->id);
        return redirect('/keluarga')->with('pesan','Data Berhasil Dihapus');
    }

    
}
