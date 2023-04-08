<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Komen;
use App\Models\Jawaban;

use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function index()
    {
        if(Auth::user()->pangkat=="admin"){
    $komens = Komen::get();
    return view('komen.index', compact('komens'));
        }
    }

    public function create()
    {
        if(Auth::user()->pangkat=="admin"){
        return view ('komen.create');
    }
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
        'komen'=>['required','unique:komens,komen', 'max:30'],
        ]);
        $jawaban = Jawaban::find($id);

        Komen::create([
            'komen'=>$request->get('komen'),
            'id_pertanyaan'=>NULL,
            'id_jawaban'=>$id,
            'id_user'=>Auth::user()->id,
            ]);
            
        return redirect()->route('pertanyaan.show', [$$jawaban->id_pertanyaan])->with('message', 'Komentar berhasil dibuat');
        
    }

    public function edit($id_komen){
        if(Auth::user()->pangkat=="admin"){
        $komens = Komen::find($id_komen);
        return view('komen.edit',compact('komens'));
        }
    }
    
    public function update(Request $request, $id){
        if(Auth::user()->pangkat=="admin"){
        $this->validate($request,[
            'komen'=>['required','unique:komen,komen','max:30'],
            'id_pertanyaan'=>$request->get('id_pertanyaan'),
            'id_jawaban'=>$request->get('id_jawaban'),
            ]);

            $komen = Komen::find($id);
            
            $komen->komen=$request->get('komen');
            $komen->save();

        return redirect()->route('komen.index')->with('message','komen berhasil diubah');
        }
    }

    
    public function destroy($id)
    {
        if(Auth::user()->pangkat=="admin"){
    $komen = Komen::find($id);
    $komen->delete();

    return redirect()->route('komen.index')->with('message','komen berhasil dihapus');
    }
    }
}
