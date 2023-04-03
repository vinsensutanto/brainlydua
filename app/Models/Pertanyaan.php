<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pertanyaan';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'id','id');
    }

    public function kategori(){
        return $this->hasOne(Kategori::class,'id_kategori','id_kategori');
    }

    public function kelas(){
        return $this->hasOne(Kelas::class,'id_kelas','id_kelas');
    }

    public function jawaban(){
        return $this->hasOne(Jawaban::class, 'id_jawaban','id_jawaban');
    }

    public function komen(){
        return $this->hasMany(Komen::class, 'id_komen','id_komen');
    }
}
