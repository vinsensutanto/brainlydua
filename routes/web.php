<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Kategori;
use App\Models\Kelas;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

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
    $kelass = Kelas::get();
    $kategoris = Kategori::get();
    return view('welcome',compact('kelass', 'kategoris'));
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('kelas', 'KelasController');
Route::resource('kategori', 'KategoriController');
Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('komen', 'KomenController');
Route::resource('jawaban', 'JawabanController');
Route::post('/cari', 'InputController@cari');

// Route::match(['get', 'post'], 'register', function(){
//     return redirect('/');
//     });