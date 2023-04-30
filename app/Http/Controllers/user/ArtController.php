<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index()
    {
        $artikels= Artikel::latest()->paginate(5);
        return view('user/artikel',[
            "title"=>"Artikel",
            "posts"=>$artikels
        ]);
    }

    public function show(Artikel $post){
        return view ('user/post',[
            "title"=> "Single post",
            "post"=> $post
        ]);
    }
}
