<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsul extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'jenis_keluhan',
        'username',
        'jenis_kelamin',
        'usia',
        'berat_badan',
        'tinggi_badan',
        'gol_darah',
        'keluhan',
        'solusi',
        'id_user',
        'judul'
    ];

    function dokter(){
        return $this->belongsTo(User::class,'id_user');
    }
}
