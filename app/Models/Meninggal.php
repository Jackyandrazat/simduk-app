<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'id','nik','date_meninggal','jam','lokasi_meninggal','lokasi_pemakaman'
    ];
    public $timestamps = true;

    public function meninggalRelation()
    {
    	return $this->belongsTo(Warga::class,'nik','id');
    }
}
