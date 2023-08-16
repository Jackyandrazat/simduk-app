<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class WargaController extends Controller
{
    //
    public function index()
    {
        $data = Warga::orderBy('nama', 'asc')->get();
        return view('admin.warga.warga', [
            'wargas' => $data
        ]);
    }

    public function generatePDF()
    {
        $wargas = Warga::get();

        $data = [
            'title' => 'REKAP DATA WARGA RT.2 RW.5 Komplek Waluyo',
            'date' => date('m/d/Y'),
            'wargas' => $wargas
        ];

        $pdf = FacadePdf::loadView('admin.warga.myPDF', $data);

        return $pdf->stream('rekap-data-warga.pdf');
    }

    public function downloadPDF()
    {
        $wargas = Warga::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'wargas' => $wargas
        ];

        $pdf = FacadePdf::loadView('admin.warga.myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

    public function create()
    {
        return view('admin.warga.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|unique:wargas|max:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'status_kk' => 'required',
            'usia' => 'required',
            'status_tempat_tngl' => 'required',
            'status_kependudukan' => 'required',
            'RW' => 'required',
            'RT' => 'required',
        ],[
            'nik.required' => 'Kolom harus diisi.',
            'nama.required' => 'Kolom harus diisi.',
            'tempat_lahir.required' => 'Kolom harus diisi.',
            'tanggal_lahir.required' => 'Kolom harus diisi.',
            'jenis_kelamin.required' => 'Kolom harus diisi.',
            'pendidikan.required' => 'Kolom harus diisi.',
            'agama.required' => 'Kolom harus diisi.',
            'pekerjaan.required' => 'Kolom harus diisi.',
            'alamat.required' => 'Kolom harus diisi.',
            'status.required' => 'Kolom harus diisi.',
            'status_kk.required' => 'Kolom harus diisi.',
            'usia.required' => 'Kolom harus diisi.',
            'status_tempat_tngl.required' => 'Kolom harus diisi.',
            'status_kependudukan.required' => 'Kolom harus diisi.',
            'RW.required' => 'Kolom harus diisi.',
            'RT.required' => 'Kolom harus diisi.',

        ]);


        Warga::create($validatedData);
        return redirect('/warga')->with('success', 'Data berhasil disimpan');
    }

    public function checkNik(Request $request)
    {
        $nik = $request->input('nik');
        $exists = Warga::where('nik', $nik)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function edit(Warga $warga)
    {
        return view('admin.warga.edit', ['warga' => $warga]);
    }

    public function show(Warga $warga)
    {
        return view('admin.warga.show', [
            'warga' => $warga,
            'wargas' => Warga::all()

        ]);
    }

    public function update(Request $request, Warga $warga)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'status_kk' => 'required',
            'usia' => 'required',
            'status_tempat_tngl' => 'required',
            'status_kependudukan' => 'required',
            'RW' => 'required',
            'RT' => 'required',
        ]);
        // dd($validatedData);
        Warga::where('id', $warga->id)->update($validatedData);
        return redirect('/warga');
    }

    public function destroy(Warga $warga)
    {
        Warga::destroy($warga->id);
        return redirect('/warga')->with('pesan', 'Data Berhasil Dihapus');
    }
}
