<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Aspirasi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    $inputs = Input::get();
    $siswas = Siswa::get();
    $kategoris = Kategori::get();
    return view('welcome',compact('inputs','siswas','kategoris'));
});

Route::get('/tentang', function () {
    $inputs = Input::get();
    $siswas = Siswa::get();
    $kategoris = Kategori::get();
    return view('tentang',compact('inputs','siswas','kategoris'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('siswa', 'SiswaController')->middleware('auth');
Route::resource('kategori', 'KategoriController')->middleware('auth');
Route::resource('input', 'InputController');
Route::post('/cari','InputController@cari');
Route::resource('aspirasi', 'AspirasiController')->middleware('auth');

// Route::view('/admin', 'home');
Route::get('/user/pengaduan', 'PengaduanController@pengaduanUser')->middleware('auth');
Route::get('/laporan','PengaduanController@laporan')->middleware('auth');
Route::get('/laporan/cetak','PengaduanController@pdf')->middleware('auth');

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
    });