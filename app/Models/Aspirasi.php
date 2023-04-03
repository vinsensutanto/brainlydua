<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_aspirasi';
    protected $guarded = [];
    
    public function input(){
        return $this->belongsTo(Input::class);
    }
}
