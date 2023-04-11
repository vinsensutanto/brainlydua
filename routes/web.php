<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
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
    $pertanyaans = Pertanyaan::orderBy('created_at','desc')->paginate(7);
    $kelass = Kelas::get();
    $kategoris = Kategori::get();
    return view('welcome',compact('kelass', 'kategoris','pertanyaans'));
});

Route::post('/list', function (Request $request) {
    $kelass = Kelas::get();
    $kategoris = Kategori::get();
    if($request->get('cari')){
        $id=$request->get('cari');
        $pertanyaans = Pertanyaan::where('pertanyaan', 'LIKE', "%{$id}%")->where('status','=','terjawab')->orWhere('status','=','dijawab')->get();
    return view('welcome',compact('kelass', 'kategoris','pertanyaans'));
    }else{
        $pertanyaans = Pertanyaan::get();
        return view('welcome',compact('kelass', 'kategoris','pertanyaans'));
    }
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('kelas', 'KelasController')->middleware('auth');
Route::resource('kategori', 'KategoriController')->middleware('auth');
Route::resource('pertanyaan', 'PertanyaanController');
Route::resource('komen', 'KomenController');
Route::resource('jawaban', 'JawabanController');
Route::post('/cari', 'PertanyaanController@cari');
Route::post('/rating/{rating}','RatingController@store');
Route::post('/komen/{id}','KomenController@store');
Route::get('/profile', 'UserController@profile');

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
    });