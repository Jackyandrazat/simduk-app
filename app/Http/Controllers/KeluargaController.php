<?php

namespace App\Http\Controllers;


use App\Models\Warga;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
    
        return view('admin.keluarga.create');
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'no_kk' => 'required|max:16',
            'nama_keluarga' => 'required',
        ],[
            'no_kk.required' => 'Kolom harus diisi.',
            'nama_keluarga.required' => 'Kolom harus diisi.',          
        ]);

        // dd($validatedData);
        Keluarga::create($validatedData);
        return redirect('/keluarga')->with('success', 'Data berhasil disimpan');
    }

    public function show(Keluarga $keluarga)
    {
        $wargas = DB::table('wargas')
            ->join('keluargas', 'wargas.keluarga_id', '=', 'keluargas.id')
            ->select('wargas.*')
            ->where('keluargas.id', $keluarga->id)
            ->get();

            $suami = Warga::where('status_kk', 'suami')
            ->where('keluarga_id', $keluarga->id)
            ->first(); 

            $istri = Warga::where('status_kk', 'istri')
            ->where('keluarga_id', $keluarga->id)
            ->first(); 

            $anak = Warga::where('status_kk', 'anak')
            ->where('keluarga_id', $keluarga->id)
            ->first(); 
    
        return view('admin.keluarga.show', [
            'keluarga' => $keluarga,
            'wargas' => $wargas,
            'suami' => $suami,
            'anak' => $anak,
            'istri' => $istri
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
