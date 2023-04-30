<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'hari',
        'jam',
        'jam2',
        'jam3',
        'jam4'
    ];

}
