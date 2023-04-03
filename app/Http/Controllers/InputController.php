<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Input;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;

class InputController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['store', 'cari']]);
    }

    public function index()
    {
    $inputs = Input::get();
    return view('input.index', compact('inputs'));
    }

    public function create()
    {
        $siswas = Siswa::get();
        $kategoris = Kategori::get();
        return view ('input.create', compact('siswas','kategoris'));
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
        'nis'=>['required', 'max:10'],
        'id_kategori'=>['required', 'max:5'],
        'lokasi'=>['required', 'max:255'],
        'foto'=>['max:255'],
        'ket'=>['required', 'max:255'],
        ]);

        if(!Auth::user()){
            $siswas = Siswa::where('nis', '=', $request->get('nis'))->first();
            if (!isset($siswas)){
                return redirect('/#lapor')->with('message','Laporan gagal dibuat karena NIS invalid');
            }
        }else{
            $siswas = Siswa::where('nis', '=', $request->get('nis'))->first();
            if (!isset($siswas)){
                return redirect()->route('input.index')->with('message','Laporan gagal dibuat karena NIS invalid');
            }
        }
        $kode = time().'-'.$request->get('nis');

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $name = time().'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath,$name);
            }

        if($request->hasFile('foto')){
        Input::create([
            'nis'=>$request->get('nis'),
            'id_kategori'=>$request->get('id_kategori'),
            'lokasi'=>$request->get('lokasi'),
            'ket'=>$request->get('ket'),
            'foto'=>$name,
            'kode'=>$kode
            ]);
        }else{
        Input::create([
            'nis'=>$request->get('nis'),
            'id_kategori'=>$request->get('id_kategori'),
            'lokasi'=>$request->get('lokasi'),
            'ket'=>$request->get('ket'),
            'foto'=>'tidakada',
            'kode'=>$kode
            ]);
        }

        if(Auth::user()){
        return redirect()->route('input.index')->with('message','Laporan baru berhasil dibuat dengan kode: '.$kode);
        }else{
            return redirect('/#lapor')->with('message','Laporan baru berhasil dibuat dengan kode: '.$kode);
        }
    }

    public function edit($nis){
        $inputs = Input::find($nis);
        $siswas = Siswa::get();
        $kategoris = Kategori::get();
        return view('input.edit',compact('inputs','siswas','kategoris'));
    }
    
    public function update(Request $request, $id){
       
        $this->validate($request,[
            'nis'=>['required', 'max:10'],
            'id_kategori'=>['required', 'max:5'],
            'lokasi'=>['required', 'max:255'],
            'foto'=>['max:255'],
            'ket'=>['required', 'max:255'],
            ]);

            $input = Input::find($id);
            $name = $input->foto;
            
            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $name = time().'.'.$foto->getClientOriginalExtension();
                $destinationPath = public_path('/foto');
                $foto->move($destinationPath,$name);
            }

            $input->nis=$request->get('nis');
            $input->id_kategori=$request->get('id_kategori');
            $input->lokasi=$request->get('lokasi');
            $input->foto=$name;
            $input->ket=$request->get('ket');
            $input->save();

        return redirect()->route('input.index')->with('message','Laporan berhasil diubah');
    }

    
    public function destroy($id)
    {
    $input = Input::find($id);
    $input->delete();

    return redirect()->route('input.index')->with('message','Laporan berhasil dihapus');
    }

    public function show($id)
    {
        $aspirasi=Aspirasi::all()->where('id_pelaporan','=', $id);
        $aspirasis=Aspirasi::orderBy('created_at','DESC')->where('id_pelaporan','=', $id)->first();
        if(!isset($aspirasis)){
            $aspirasis=null;
        }
        if(!isset($aspirasi)){
            $aspirasi=null;
        }

    $inputs = Input::find($id);
    return view('input.detail', compact('inputs','aspirasis','aspirasi'));
    }

    public function cari(Request $request)
	{
        $id=$request->get('cari');
		$spesifik = Input::where('kode','=',$id)->first();

        $aspirasi=Aspirasi::all()->where('id_pelaporan','=', $spesifik->id_pelaporan);
        $aspirasis=Aspirasi::orderBy('created_at','DESC')->where('id_pelaporan','=', $spesifik->id_pelaporan)->first();

        //esensial buat form
        $inputs = Input::get();
        $siswas = Siswa::get();
        $kategoris = Kategori::get();
		return view('welcome',compact('spesifik','aspirasis','aspirasi','inputs','kategoris','siswas'));
 
	}

    public function laporan()
    {
        $inputs = Input::latest()->get();
        return view('input.laporan',compact('inputs'));
    }
}
