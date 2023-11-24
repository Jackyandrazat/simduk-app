<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Warga;
use App\Models\Keluarga;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon as Carboon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WargasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $kk = Keluarga::where('no_kk', $row['kk'])->first();

        if ($kk) {
            Warga::create([
                'keluarga_id' => $kk->id,
                'nik' => $row['nik'],
                'nama' => $row['nama_warga'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => Carboon::createFromFormat("m/d/Y", $row['tanggal_lahir']),
                'jenis_kelamin' => $row['jenis_kelamin'],
                'pendidikan' => $row['pendidikan'],
                'agama' => $row['agama'],
                'pekerjaan' => $row['pekerjaan'],
                'alamat' => $row['alamat'],
                'alamat_baru' => $row['alamat_baru'],
                'status' => $row['status'],
                'status_kk' => $row['status_kk'],
                'usia' => $row['usia'],
                'status_tempat_tngl' => $row['status_tempat_tinggal'],
                'status_kependudukan' => $row['status_kependudukan'],
                'RW' => $row['rw'],
                'RT' => $row['rt'],
            ]);
        } else {
            Log::error("No KK {$row['kk']} not found.");
        }
    }
}
