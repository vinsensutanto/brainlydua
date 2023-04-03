<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pelaporan';
    protected $guarded =[];

    public function siswa(){
        return $this->belongsTo(Siswa::class,'nis','nis');
    }

    public function kategori(){
        return $this->hasOne(Kategori::class,'id_kategori','id_kategori');
    }

    public function aspirasi(){
        return $this->hasOne(Aspirasi::class, 'id_aspirasi','id_aspirasi');
    }
}
