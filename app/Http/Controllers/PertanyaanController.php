<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;

class PertanyaanController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['store', 'cari']]);
    }

    public function index()
    {
    $pertanyaans = Pertanyaan::get();
    return view('pertanyaan.index', compact('pertanyaans'));
    }

    public function create()
    {
        // $users = User::get();
        // $kategoris = Kategori::get();
        return view ('pertanyaan.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request,[
        'pertanyaan'=>['max:1000'],
        'foto'=>['mimes:jpeg,png,jpg'],
        ]);

        if(!Auth::user()){
            $user=0;
        }else{
            $user=$request->get('id_user');
        }

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath,$namafoto);
            }
        else{
            $namafoto ='none.png';
        }

        Pertanyaan::create([
            'id_user'=>$user,
            'pertanyaan'=>$request->get('pertanyaan'),
            'status'=>$request->get('status'),
            'id_kategori'=>$request->get('id_kategori'),
            'id_kelas'=>$request->get('id_kelas'),
            'foto'=>$namafoto,
            ]);

        return redirect()->route('pertanyaan.index')->with('message','Laporan baru berhasil dibuat dengan kode: ');
    }

    public function edit($id_user){
        $pertanyaans = Pertanyaan::find($id_user);
        // $users = User::get();
        // $kategoris = Kategori::get();
        return view('pertanyaan.edit',compact('pertanyaans'));
    }
    
    public function update(Request $request, $id){
       
        $this->validate($request,[
            'pertanyaan'=>['max:1000'],
            'foto'=>['mimes:jpeg,png,jpg'],
            ]);

            $pertanyaan = Pertanyaan::find($id);
    
            if(!Auth::user()){
                $user=0;
            }else{
                $user=$request->get('id_user');
            }
    
            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
                $destinationPath = public_path('/foto');
                $foto->move($destinationPath,$namafoto);
                }
            else{
                $namafoto =$pertanyaan->foto;
            }
    
            Pertanyaan::create([
                'id_user'=>$user,
                'pertanyaan'=>$request->get('pertanyaan'),
                'status'=>$request->get('status'),
                'id_kategori'=>$request->get('id_kategori'),
                'id_kelas'=>$request->get('id_kelas'),
                'foto'=>$namafoto,
                ]);

            $pertanyaan->id_user=$user;
            $pertanyaan->pertanyaan=$request->get('pertanyaan');
            $pertanyaan->status=$request->get('status');
            $pertanyaan->id_kategori=$request->get('id_kategori');
            $pertanyaan->id_kelas=$request->get('id_kelas');
            $pertanyaan->foto=$namafoto;
            $pertanyaan->save();

        return redirect()->route('pertanyaan.index')->with('message','Laporan berhasil diubah');
    }

    
    public function destroy($id)
    {
    $pertanyaan = Pertanyaan::find($id);
    $pertanyaan->delete();

    return redirect()->route('pertanyaan.index')->with('message','Laporan berhasil dihapus');
    }

    public function show($id)
    {
        $jawaban=Jawaban::all()->where('id_pertanyaan','=', $id);
        $jawabans=Jawaban::orderBy('created_at','DESC')->where('id_pertanyaan','=', $id)->first();
        if(!isset($jawabans)){
            $jawabans=null;
        }
        if(!isset($jawaban)){
            $jawaban=null;
        }

    $pertanyaans = Pertanyaan::find($id);
    return view('pertanyaan.detail', compact('pertanyaans','jawabans','jawaban'));
    }

    public function cari(Request $request)
	{
        $id=$request->get('cari');
		$spesifik = Pertanyaan::where('kode','=',$id)->first();

        $jawaban=Jawaban::all()->where('id_pertanyaan','=', $spesifik->id_pertanyaan);
        $jawabans=Jawaban::orderBy('created_at','DESC')->where('id_pertanyaan','=', $spesifik->id_pertanyaan)->first();

        //esensial buat form
        $pertanyaans = Pertanyaan::get();
        $users = User::get();
        // $kategoris = Kategori::get();
		return view('welcome',compact('spesifik','jawabans','jawaban','pertanyaans','users'));
 
	}

    public function laporan()
    {
        $pertanyaans = Pertanyaan::latest()->get();
        return view('pertanyaan.laporan',compact('pertanyaans'));
    }
}
