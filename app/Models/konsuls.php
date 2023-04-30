<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsuls extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'konsultasikeluhan_id',
       
    ];

    function dokter(){
        return $this->belongsTo(User::class,'id_user');
    }
    function user(){
        return $this->belongsTo(User::class,'konsultasikeluhan_id');
    }
}
