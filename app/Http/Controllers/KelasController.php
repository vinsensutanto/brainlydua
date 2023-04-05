<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        if(Auth::user()->pangkat=="admin"){
    $kelass = Kelas::get();
    return view('kelas.index', compact('kelass'));
        }
    }

    public function create()
    {
        if(Auth::user()->pangkat=="admin"){
        return view ('kelas.create');
        }
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if(Auth::user()->pangkat=="admin"){
        $this->validate($request,[
        'kelas'=>['required','unique:kelas,kelas', 'max:30'],
        ]);


        Kelas::create([
            'kelas'=>$request->get('kelas')
            ]);

        return redirect()->route('kelas.index')->with('message','kelas baru berhasil dibuat');
        }
    }

    public function edit($id_kelas)
    {
        if(Auth::user()->pangkat=="admin"){
        $kelass = Kelas::find($id_kelas);
        return view('kelas.edit',compact('kelass'));
        }
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::user()->pangkat=="admin"){
        $this->validate($request,[
            'kelas'=>['required','unique:kelas,kelas','max:30'],
            ]);

            $kelas = Kelas::find($id);
            
            $kelas->kelas=$request->get('kelas');
            $kelas->save();

        return redirect()->route('kelas.index')->with('message','kelas berhasil diubah');
        }
    }

    
    public function destroy($id)
    {
        if(Auth::user()->pangkat=="admin"){
    $kelas = Kelas::find($id);
    $kelas->delete();

    return redirect()->route('kelas.index')->with('message','kelas berhasil dihapus');
        }
    }
}
