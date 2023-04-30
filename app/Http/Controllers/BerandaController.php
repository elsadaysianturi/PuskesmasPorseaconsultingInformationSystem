<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\jadwal;
use App\Models\struktur;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('/admin/Home', [
            'struktur' => struktur::all(),
            'jadwal' => jadwal::all()
        ]);
    }
    
}
