<?php

namespace App\Http\Controllers;

use App\Models\struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/struktur.index',[
            'strukturs' => struktur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/struktur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:500',
                'image' => 'required|image'
            ]);
    
            $validatedData ['user_id'] = auth()->user()->id;     
            $validatedData['file_path']  = Storage::disk('public_uploads')->put('file_upload', $request->image);
            
            struktur::create($validatedData);
    
            return redirect('admin/struktur')->with('toast_success','Struktur berhasil dibuat');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            return redirect('admin/struktur')->with('toast_error','Gagal membuat struktur');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(struktur $struktur){
        return view ('admin/struktur.post',[
            "title"=> "Single post",
            "post"=> $struktur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $struktur = struktur::find($id);
        return view('admin/struktur.edit', compact('struktur'));
        // [
        //     // 'post' => $post
        // ]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try {
            $struktur =struktur::find($id);
            $validatedData = $request->validate([
                'title' => 'required|max:500',
            ]);

            $validatedData ['user_id'] = auth()->user()->id;    

            if ($request->image != null) {
                $validatedData['file_path']  = Storage::disk('public_uploads')->put('file_upload', $request->image);
            }
            
            $struktur->update($validatedData);

            return redirect('admin/struktur')->with('toast_success','struktur berhasil diedit');
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur = struktur::find($id);
        $struktur->delete();

        return redirect('admin/struktur')->with('toast_success','struktur berhasil dihapus');
    }
 

   
}
