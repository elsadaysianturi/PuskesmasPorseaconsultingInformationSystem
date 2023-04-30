<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\Struktur;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('/beranda', [
            'struktur' => Struktur::all(),
            'jadwal' => jadwal::all()
        ]);
    }

    public function show()
    {
        return view('/user/berandaa', [
            'struktur' => Struktur::all(),
            'jadwal' => jadwal::all()
        ]);
    }
}
