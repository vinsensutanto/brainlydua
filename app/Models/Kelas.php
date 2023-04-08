<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kelas';
    protected $guarded = [];
    
    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class,'id_pertanyaan','id_pertanyaan');
    }
}
