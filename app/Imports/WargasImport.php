<?php

namespace App\Imports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WargasImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Warga([
            'nik' => $row['nik'],
            'nama' => $row['nama_warga'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => \Carbon\Carbon::createFromFormat('m/d/Y', $row['tanggal_lahir']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'pendidikan' => $row['pendidikan'],
            'agama' => $row['agama'],
            'pekerjaan' => $row['pekerjaan'],
            'alamat' => $row['alamat'],
            'status' => $row['status'],
            'status_kk' => $row['status_kk'],
            'usia' => $row['usia'],
            'status_tempat_tngl' => $row['status_tempat_tinggal'],
            'status_kependudukan' => $row['status_kependudukan'],
            'RW' => $row['rw'],
            'RT' => $row['rt'],
        ]);
    }
}
