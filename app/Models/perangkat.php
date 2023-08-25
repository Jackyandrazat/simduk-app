<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perangkat extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'id','nik','jabatan','tanggal_diangkat','tanggal_selesai','keterangan'
    ];
    public $timestamps = true;

    public function perangkatRelation()
    {
    	return $this->belongsTo(Warga::class,'nik','id');
    }
    
    
}
