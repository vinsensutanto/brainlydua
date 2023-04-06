<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_rating';
    protected $guarded = [];
    
    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
    
    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class);
    }
    
    public function jawaban() {
        return $this->belongsTo(Jawaban::class);
    }
}
