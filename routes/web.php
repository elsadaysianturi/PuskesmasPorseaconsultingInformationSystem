<?php

use App\Http\Controllers\AdminConsultationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSaransController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ConsultationsControler;
use App\Http\Controllers\DokterArtikelController;
use App\Http\Controllers\DokterConsultationsController;
use App\Http\Controllers\DokterProfileController;
use App\Http\Controllers\DokterSaranController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemeriksaUmumController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\user\ArtController;
use App\Models\konsul;
use App\Models\KonsultasiKeluhan;

// halaman beranda
// Route::get('/', function () {
//     return view('/beranda',[
//         "title"=> "Beranda"
//     ]);
// });
//halaman Profil
Route::get('/profile', function () {
    return view('profile.profile',[
        "title"=>"profile"
    ]);
})->middleware('auth');


//halaman artikel
Route::get('/',[HomePageController::class, 'index']);
Route::get('/user/berandaa',[HomePageController::class, 'show']);
Route::get('/artikel',[ArtikelController::class, 'index']);
Route::get('/user/artikel',[ArtController::class, 'index']);
Route::get('/user/posts/{post:slug}', [ArtController::class, 'show']);

//halaman single post
Route::get('posts/{post:slug}', [ArtikelController::class, 'show']);
Route::get('dokter/posts/{post:slug}', [DokterArtikelController::class, 'show'])->middleware('auth');
Route::get('admin/posts/{post:slug}', [AdminController::class, 'show'])->middleware('auth');

//halaman poli
Route::get('/poli', function () {
    return view('poli',[
        "title"=>"Poli"
    ]);
});
Route::get('/user/poli', function () {
    return view('user/poli',[
        "title"=>"Poli"
    ]);
});

Route::get('/dokter/profile/', function () {
    return view('dokter.profile.index');
})->middleware('auth');
Route::put('/dokter/update',[DokterProfileController::class,'update'])->name('dokter.profile.index')->middleware('auth');

Route::get('/admin/profile/', function () {
    return view('admin.profile.index');
})->middleware('auth');
Route::put('/admin/update',[AdminProfileController::class,'update'])->name('admin.profile.index')->middleware('auth');

//halaman Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
//Halaman Logout
Route::post('/logout', [LoginController::class, 'logout']);
//halaman registrasi
Route::get('/registrasi', [registrasiController::class, 'index']);
Route::post('/registrasi', [registrasiController::class, 'store']);
//halaman berandash
// Route::get('/beranda',[BerandaController::class, 'index'])->middleware('auth');
//halaman edit profil
Route::put('update',[UpdateProfileController::class,'update'])->name('profile.profile')->middleware('auth');


//halaman konsultasi
// Route::get('/user/konsultasi', function () {
//     return view('user.konsultasi.konsultasi',[
//         "title"=> "konsultasi",
//         'poli_1' => konsul::with('dokter')->where('jenis_keluhan', 1)->get(),
//         'poli_2' => konsul::with('dokter')->where('jenis_keluhan', 2)->get(),
//         'poli_3' => konsul::with('dokter')->where('jenis_keluhan', 3)->get(),
//         'poli_4' => konsul::with('dokter')->where('jenis_keluhan', 4)->get(),
//         'poli_5' => konsul::with('dokter')->where('jenis_keluhan', 5)->get(),
//         'poli_6' => konsul::with('dokter')->where('jenis_keluhan', 6)->get()
//     ]);
// });

// Route::get('/consultations', function () {
//     return view('konsultasi.consultations',[
//         "title"=> "konsultasi",
//         'poli_1' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 1)->get(),
//         'poli_2' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 2)->get(),
//         'poli_3' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 3)->get(),
//         'poli_4' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 4)->get(),
//         'poli_5' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 5)->get(),
//         'poli_6' => KonsultasiKeluhan::with('dokter')->where('jenis_keluhan', 6)->get()
//     ]);
// });

Route::get('/konsultasi',[ConsultationsControler::class, 'index']);
Route::get('/consultation',[ConsultationsControler::class, 'show']);

//halaman saran
Route::get('/user/saran', [SaranController::class, 'index'])->middleware('auth');
Route::post('/saran', [SaranController::class, 'store']);
Route::resource('/dokter/sarans',DokterSaranController::class);
// Route::resource('/dokter/profile/',DokterProfileController::class);

//sub-poli
Route::get('/pemeriksaan_umum', function () {
    return view('poli.pemeriksaan_umum',
    [
        "title"=>"Pemeriksa Umum",
        "id_form" => 1,
        'konsul' => new KonsultasiKeluhan()
    ]);
});
Route::get('/keluhan_pasien', function () {
    return view('poli.keluhan_pasien',
    [
        "title"=>"Pelayanan Deteksi Dini dan Tumbuh Kembang",
        'id_form' => 2,
        'konsul' => new KonsultasiKeluhan()
    ]);
});
Route::get('/pitc', function () {
    return view('poli.pitc',[
        "title"=>"PITC",
        'id_form' => 3,
        'konsul' => new KonsultasiKeluhan()
    ]);
});
Route::get('/ibu_anak', function () {
    return view('poli.ibu_anak',[
        "title"=>"Kesehatan Ibu dan Anak",
        'id_form' => 4,
        'konsul' => new KonsultasiKeluhan()
    ]);
});
Route::get('/gigi_mulut', function () {
    return view('poli.gigi_mulut',[
        "title"=>"Kesehatan Gigi dan Mulut",
        'id_form' => 5,
        'konsul' => new KonsultasiKeluhan()
    ]);
});
Route::get('/gizi', function () {
    return view('poli.gizi',[
        "title"=>"Konseling Gizi",
        'id_form' => 6,
        'konsul' => new KonsultasiKeluhan()
    ]);
});

Route::post('konsultasi_umum', [PemeriksaUmumController::class , 'store'])->middleware('auth');
Route::get('konsul_delete/{id}', [PemeriksaUmumController::class , 'destroy'])->middleware('auth');
Route::get('konsul/{jenis}/{id}', [PemeriksaUmumController::class , 'edit'])->middleware('auth');
Route::post('konsultasi_umum/edit/{id}', [PemeriksaUmumController::class, 'update'])->middleware('auth');

Route::get('/dokter/Home', function () {
    return view('dokter/Home');
});
// Route::post('/dokter/Home', [SaranController::class, 'store']);

Route::get('/dokter/saran', function () {
    return view('dokter/saran');
});
Route::get('/dokter/poly', function () {
    return view('dokter/poly');
});

Route::resource('/dokter/articles',DokterArtikelController::class);
Route::resource('/dokter/consultation',DokterConsultationsController::class);
// Route::get('/dokter/consultation/edit', [DokterConsultationsController::class, 'update']);

//admin
Route::get('/articles/checkSlug',[AdminController::class,'checkSlug']);
// Route::get('/admin/Home', function () {
//     return view('admin/Home');
// });
Route::get('/admin/Home',[BerandaController::class, 'index']);

Route::get('/admin/poly', function () {
    return view('admin/poly');
});
Route::get('/admin/beranda', function () {
    return view('admin/home');
});

Route::resource('/admin/consultations',AdminConsultationController::class);
Route::resource('/admin/sarans',AdminSaransController::class);
Route::resource('/admin/articles',AdminController::class)->middleware('auth');
// Route::put('/articles',[AdminController::class,'update']);

Route::resource('/admin/struktur',StrukturController::class);
Route::resource('/admin/jadwal',JadwalController::class);



Route::get('/user/pemeriksaan_umum', function () {
    return view('user.poli.pemeriksaan_umum',
    [
        "title"=>"Pemeriksa Umum",
        "id_form" => 1,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');
Route::get('/user/keluhan_pasien', function () {
    return view('user.poli.keluhan_pasien',
    [
        "title"=>"Pelayanan Deteksi Dini dan Tumbuh Kembang",
        'id_form' => 2,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');
Route::get('/user/pitc', function () {
    return view('user.poli.pitc',[
        "title"=>"PITC",
        'id_form' => 3,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');
Route::get('/user/ibu_anak', function () {
    return view('user.poli.ibu_anak',[
        "title"=>"Kesehatan Ibu dan Anak",
        'id_form' => 4,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');
Route::get('/user/gigi_mulut', function () {
    return view('user.poli.gigi_mulut',[
        "title"=>"Kesehatan Gigi dan Mulut",
        'id_form' => 5,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');
Route::get('/user/gizi', function () {
    return view('user.poli.gizi',[
        "title"=>"Konseling Gizi",
        'id_form' => 6,
        'konsul' => new KonsultasiKeluhan()
    ]);
})->middleware('auth');


