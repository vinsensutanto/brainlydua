<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    
    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class);
    }
    
    public function jawaban() {
        return $this->belongsTo(Jawaban::class);
    }
}
