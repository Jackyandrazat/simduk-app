<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'wargas'; 
    protected $fillable =[
        'id','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','pendidikan','agama','pekerjaan','alamat','status','status_kk','usia','status_tempat_tngl','status_kependudukan','RW','RT'
    ];
    public $timestamps = true;
}
