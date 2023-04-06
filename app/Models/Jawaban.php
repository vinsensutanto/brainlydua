<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jawaban';
    protected $guarded = [];
    
    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class);
    }
    
    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
}
