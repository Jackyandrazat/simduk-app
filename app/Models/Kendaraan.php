<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'id','nik','nama_kendaraan','no_plat'
    ];
    public $timestamps = true;

    public function kendaraanRelation()
    {
    	return $this->belongsTo(Warga::class,'nik','id');
    }
}
