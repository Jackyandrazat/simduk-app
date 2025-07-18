<?php

namespace App\Http\Controllers;

use App\Models\Meninggal;
use App\Models\Tamu;
use App\Models\Warga;
use Illuminate\Http\Request;

class MeninggalController extends Controller
{
    //
    public function index()
    {
        return view('admin.meninggal.meninggal', [
            'meninggals' => Meninggal::all()
        ]);
    }

    public function create()
    {
        return view('admin.meninggal.create', [
            'wargas' => Warga::all()

        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'date_meninggal' => 'required',
            'jam' => 'required',
            'lokasi_meninggal' => 'required',
            'lokasi_pemakaman' => 'required'
        ]);

        // Simpan data warga meninggal ke dalam tabel "meninggal"
        Meninggal::create($validatedData);

        // Cari warga yang sesuai berdasarkan NIK
        $nik = $validatedData['nik'];
        $warga = Warga::where('id', $nik)->first();

        // Jika warga ditemukan, ubah atribut status_kependudukan menjadi "meninggal"
        if ($warga) {
            $warga->status_kependudukan = 'Meninggal';
            $warga->save();
        }

        return redirect('/meninggal')->with('success', 'Data berhasil disimpan');
    }


    public function edit(Meninggal $meninggal)
    {
        return view('admin.meninggal.edit', [
            'meninggal' => $meninggal,
            'wargas' => Warga::all()
        ]);
    }
    public function update(Request $request, Meninggal $meninggal)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'date_meninggal' => 'required',
            'jam' => 'required',
            'lokasi_meninggal' => 'required',
            'lokasi_pemakaman' => 'required'
        ]);
        // dd($validatedData);
        Meninggal::where('id', $meninggal->id)->update($validatedData);
        return redirect('/meninggal');
    }

    public function destroy(Meninggal $meninggal)
    {
        Meninggal::destroy($meninggal->id);
        return redirect('/meninggal')->with('pesan', 'Data Berhasil Dihapus');
    }
}
