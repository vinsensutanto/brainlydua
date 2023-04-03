<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
    $kategoris = Kategori::get();
    return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view ('kategori.create');
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
        'kategori'=>['required','unique:kategoris,kategori', 'max:30'],
        ]);


        Kategori::create([
            'kategori'=>$request->get('kategori')
            ]);

        return redirect()->route('kategori.index')->with('message','Kategori baru berhasil dibuat');
    }

    public function edit($id_kategori){
        $kategoris = Kategori::find($id_kategori);
        return view('kategori.edit',compact('kategoris'));
    }
    
    public function update(Request $request, $id){
       
        $this->validate($request,[
            'kategori'=>['required','unique:kategoris,kategori','max:30'],
            ]);

            $kategori = Kategori::find($id);
            
            $kategori->kategori=$request->get('kategori');
            $kategori->save();

        return redirect()->route('kategori.index')->with('message','Kategori berhasil diubah');
    }

    
    public function destroy($id)
    {
    $kategori = Kategori::find($id);
    $kategori->delete();

    return redirect()->route('kategori.index')->with('message','Kategori berhasil dihapus');
    }
}
