<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'id','nik','nama_tamu','nik_tamu','keperluan','lama_bertamu'
    ];
    public $timestamps = true;

    public function tamuRelation()
    {
    	return $this->belongsTo(Warga::class,'nik','id');
    }
}
