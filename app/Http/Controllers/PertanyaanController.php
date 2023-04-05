<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Kelas;

class PertanyaanController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['store', 'create']]);
    }

    public function index()
    {
        if(Auth::user()->pangkat=="admin"){
    $pertanyaans = Pertanyaan::get();
    return view('pertanyaan.index', compact('pertanyaans'));
        }
    }

    public function create()
    {
        $kelass = Kelas::get();
        $kategoris = Kategori::get();
        return view ('pertanyaan.create',compact('kelass','kategoris'));
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
            $user=Auth::user()->id;
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

        $kode = $user.'pt'.time();

        Pertanyaan::create([
            'id_user'=>$user,
            'pertanyaan'=>$request->get('pertanyaan'),
            'status'=>'menunggu',
            'id_kategori'=>$request->get('id_kategori'),
            'id_kelas'=>$request->get('id_kelas'),
            'foto'=>$namafoto,
            'kode'=>$kode,
            ]);
            
        return redirect()->route('pertanyaan.show', [$kode])->with('message','Laporan baru berhasil dibuat dengan kode: ');
    }

    public function edit($id_user){
        if(Auth::user()->pangkat=="admin"){
        $pertanyaans = Pertanyaan::find($id_user);
        return view('pertanyaan.edit',compact('pertanyaans'));
        }
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::user()->pangkat=="admin"){   
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
    }

    
    public function destroy($id)
    {
        if(Auth::user()->pangkat=="admin"){
    $pertanyaan = Pertanyaan::find($id);
    $pertanyaan->delete();

    return redirect()->route('pertanyaan.index')->with('message','Laporan berhasil dihapus');
        }
    }

    public function show($id)
    {
        $pertanyaans = Pertanyaan::where('kode','=',$id)->orWhere('id_pertanyaan','=',$id)->first();
        $id_pertanyaans = $pertanyaans->id_pertanyaan;
        $jawaban=Jawaban::all()->where('id_pertanyaan','=', $id_pertanyaans);
        $jawabans=Jawaban::orderBy('created_at','DESC')->where('id_pertanyaan','=', $id_pertanyaans)->first();
        if(!isset($jawabans)){
            $jawabans=null;
        }
        if(!isset($jawaban)){
            $jawaban=null;
        }

    return view('pertanyaan.detail', compact('pertanyaans','jawabans','jawaban'));
    }

    public function cari(Request $request)
	{   
        if($request->get('kelas')){
        $kelas=$request->get('kelas');
        $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->get();
            if($request->get('kategori')){
                $kategori=$request->get('kategori');
                $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('id_kategori','=',$kategori)->get();
                if($request->get('cari')){
                    $id=$request->get('cari');
                    $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('id_kategori','=',$kategori)->where('pertanyaan', 'LIKE', "%{$id}%")->get();
                    if($request->get('status')){
                        $status=$request->get('status');
                        $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('id_kategori','=',$kategori)->where('pertanyaan', 'LIKE', "%{$id}%")->where('status','=',$status)->get();
                        }
                    }
                if($request->get('status')){
                    $status=$request->get('status');
                    $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('id_kategori','=',$kategori)->where('status','=',$status)->get();
                    }
            }elseif($request->get('cari')){
                $id=$request->get('cari');
                $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('pertanyaan', 'LIKE', "%{$id}%")->get();
                if($request->get('status')){
                    $status=$request->get('status');
                    $spesifik = Pertanyaan::where('id_kelas','=',$kelas)->where('pertanyaan', 'LIKE', "%{$id}%")->where('status','=',$status)->get();
                    }
                }
        }elseif($request->get('kategori')){
        $kategori=$request->get('kategori');
        $spesifik = Pertanyaan::where('id_kategori','=',$kategori)->get();
            if($request->get('cari')){
            $id=$request->get('cari');
            $spesifik = Pertanyaan::where('id_kategori','=',$kategori)->where('pertanyaan', 'LIKE', "%{$id}%")->get();
            if($request->get('status')){
                $status=$request->get('status');
                $spesifik = Pertanyaan::where('id_kategori','=',$kategori)->where('pertanyaan', 'LIKE', "%{$id}%")->where('status','=',$status)->get();
                }
            }
        }elseif($request->get('cari')){
        $id=$request->get('cari');
        $spesifik = Pertanyaan::where('pertanyaan', 'LIKE', "%{$id}%")->get();
        if($request->get('status')){
            $status=$request->get('status');
            $spesifik = Pertanyaan::where('pertanyaan', 'LIKE', "%{$id}%")->where('status','=',$status)->get();
            }
        }elseif($request->get('status')){
            $status=$request->get('status');
            $spesifik = Pertanyaan::where('status','=',$status)->get();
        }
        if(isset($spesifik)){
		$pertanyaans=$spesifik->take(7);
        }else{
            $pertanyaans = Pertanyaan::get()->take(7);
        }
        $users = User::get();
        $kelass = Kelas::get();
        $kategoris = Kategori::get();
        
		return view('welcome',compact('pertanyaans','users','kelass','kategoris'));
 
	}
}
