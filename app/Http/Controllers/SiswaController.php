<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
    $siswas = Siswa::get();
    return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view ('siswa.create');
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
        'nis'=>['required','unique:siswas,nis','max:10'],
        'kelas'=>['required', 'max:10'],
        ]);


        Siswa::create([
            'nis'=>$request->get('nis'),
            'kelas'=>$request->get('kelas')
            ]);

        return redirect()->route('siswa.index')->with('message','Siswa baru berhasil dibuat');
    }

    public function edit($nis){
        $siswas = Siswa::find($nis);
        return view('siswa.edit',compact('siswas'));
    }
    
    public function update(Request $request, $id){
        $ceknis=$request->get('nis');
        $this->validate($request,[
            'nis'=>['required','unique:siswas,nis,'.$id.',nis', 'max:10'],
            'kelas'=>['required', 'max:10'],
            ]);

            $siswa = Siswa::find($id);
            
            $siswa->nis=$request->get('nis');
            $siswa->kelas=$request->get('kelas');
            $siswa->save();

        return redirect()->route('siswa.index')->with('message','Siswa berhasil diubah');
    }

    
    public function destroy($id)
    {
    $siswa = Siswa::find($id);
    $siswa->delete();

    return redirect()->route('siswa.index')->with('message','Siswa berhasil dihapus');
    }
}
