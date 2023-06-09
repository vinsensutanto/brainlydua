<?php

namespace App\Http\Controllers;
use App\Models\Jawaban;
use App\Models\Pertanyaan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->pangkat=="admin"){
            $jawabans = Jawaban::get();
            return view('jawaban.index', compact('jawabans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jawaban'=>['required', 'max:1000'],
            'id_user'=>'required',
            'id_pertanyaan'=>'required',
            'foto'=>['mimes:jpeg,png,jpg', 'max:255'],
            'rating'=>'required',
        ]);

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath,$namafoto);
            }
        else{
            $namafoto ="none.png";
        }

        if(!Auth::user()){
            $user=1;
        }else{
            $user=Auth::user()->id;
        }

        Jawaban::create([
            'jawaban'=>$request->get('jawaban'),
            'id_user'=>$user,
            'id_pertanyaan'=>$request->get('id_pertanyaan'),
            'foto'=>$namafoto,
            'rating'=>0,
        ]);

        
        $pertanyaan=Pertanyaan::find($request->get('id_pertanyaan'));
        if($pertanyaan->status=="menunggu"){
            $pertanyaan->status="dijawab";
            $pertanyaan->save();
        }
        
        return redirect()->route('pertanyaan.show', [$request->get('id_pertanyaan')])->with('message', 'Pertanyaan berhasil dijawab');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        return view('jawaban.create', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->pangkat=="admin"){
    $jawaban = Jawaban::find($id);
    $jawaban->delete();

    return redirect()->route('jawaban.index')->with('message','Laporan berhasil dihapus');
        }
    }
}
