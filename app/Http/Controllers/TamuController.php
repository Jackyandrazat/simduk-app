<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Warga;
use Illuminate\Console\View\Components\Warn;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    //
    public function index()
    {
        return view('admin.tamu.tamu',[
            'tamus'=>Tamu::all()
        ]);
    }

    public function create()
     {
         return view('admin.tamu.create',[
             'wargas' => Warga::all()

         ]);
     }
    public function store(Request $request)
     {
         $validatedData=$request->validate([
             'nik' => 'required',
             'nama_tamu' => 'required',
             'nik_tamu' => 'required||max:16',
             'keperluan'=> 'required',
             'lama_bertamu'=>'required'

         ]);
 
         // dd($validatedData);
         Tamu::create($validatedData);
         return redirect('/tamu')->with('success', 'Data berhasil disimpan');
     }

     public function edit(Tamu $tamu)
        {
            return view('admin.tamu.edit', [
                'tamu' => $tamu,
                'wargas' => Warga::all()
            ]);
        }
    public function update(Request $request, Tamu $tamu)
    {
        $validatedData=$request->validate([
            'nik' => 'required',
            'nama_tamu' => 'required',
            'nik_tamu' => 'required||max:16',
            'keperluan'=> 'required',
            'lama_bertamu'=>'required'
        ]);
        // dd($validatedData);
        Tamu::where('id', $tamu->id)->update($validatedData);
        return redirect('/tamu');
    }
    
    public function destroy(Tamu $tamu)
    {
        Tamu::destroy($tamu->id);
        return redirect('/tamu')->with('pesan','Data Berhasil Dihapus');
    }
}
