<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    public $table = "komens";
    protected $primaryKey = 'id_komen';
    protected $guarded = [];
    use HasFactory;
    
    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class);
    }
    
    public function jawaban() {
        return $this->belongsTo(Jawaban::class);
    }
    
    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
    

    public static function komendump($id)
    {
        $komens=Komen::where('id_jawaban','=',$id)->orderBy('created_at', 'desc');
        return compact($komens);
    }
}
