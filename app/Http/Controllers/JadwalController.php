<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/jadwal.index', [
            'jadwal' => jadwal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jadwal.create');
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
                'hari' => 'required',
                'jam' => 'required',
                'jam2' => 'required',
                'jam3' => 'required',
                'jam4' => 'required'
            ]);
           
            jadwal::create($validatedData);

            return redirect('admin/jadwal')->with('toast_success', 'Jadwal berhasil dibuat');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return redirect('admin/jadwal')->with('toast_error', 'Gagal membuat jadwal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jadwals = jadwal::latest()->paginate(10);
        // dd($strukturs);
        return view('/beranda', compact('jadwals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwals = jadwal::find($id);
        return view('admin/jadwal.edit', compact('jadwals'));
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
            $jadwals =  jadwal::find($id);
            $validatedData = $request->validate([
                'hari' => 'required',
                'jam' => 'required',
                'jam2' => 'required',
                'jam3' => 'required',
                'jam4' => 'required'

            ]);
           
            $jadwals->update($validatedData);

            return redirect('admin/jadwal')->with('toast_success', 'Jadwal berhasil diedit');
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
        $jadwals = jadwal::find($id);
        $jadwals->delete();

        return redirect('admin/jadwal')->with('toast_success', 'struktur berhasil dihapus');
    }

  
}
