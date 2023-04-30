<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use\App\Models\artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels= Artikel::latest()->paginate(5);
        return view('artikel',[
            "title"=>"Artikel",
            "posts"=>$artikels
        ]);
    }
   
    public function show(Artikel $post){
        return view ('post',[
            "title"=> "Single post",
            "post"=> $post
        ]);
    }
}
