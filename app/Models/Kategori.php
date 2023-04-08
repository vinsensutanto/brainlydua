<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $guarded = [];

    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class,'id_pertanyaan','id_pertanyaan');
    }
}
