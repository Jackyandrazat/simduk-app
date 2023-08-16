<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'id','no_kk','nama_keluarga','nik'
    ];
    public $timestamps = true;

    public function wargaRelation()
    {
    	return $this->belongsTo(Warga::class,'nik','id');
    }
}
