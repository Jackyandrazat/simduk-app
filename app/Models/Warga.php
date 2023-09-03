<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'wargas'; 
    protected $fillable =[
        'id','keluarga_id','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','pendidikan','agama','pekerjaan','alamat','alamat_baru','status','status_kk','usia','status_tempat_tngl','status_kependudukan','RW','RT'
    ];
    public $timestamps = true;

    public function keluarga()
    {
    	return $this->belongsTo(Keluarga::class);
    }

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'nik', 'id');
    }

    public function meninggals()
    {
        return $this->hasMany(Meninggal::class, 'nik', 'id');
    }
}
