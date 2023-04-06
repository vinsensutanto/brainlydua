<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Jawaban;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'rating'=>'required',
            'id_user'=>'required',
        ]);

        $jawaban = Jawaban::find($id);
        
        $exist=Rating::where([
            ['id_user', '=', Auth::user()->id],
            ['id_jawaban', '=', $jawaban->id_jawaban],
        ]);

        if($exist){
            return redirect()->route('pertanyaan.show', [$jawaban->id_pertanyaan])->with('message', 'Rating invalid');
        } else {
            Jawaban::create([
                'id_user'=>Auth::user()->id,
                'id_jawaban'=>$request->get('id_jawaban'),
                'rating'=>$request->get('rating'),
            ]);
        $jumlah=Rating::where('id_jawaban','=',$id);
        $j=Rating::where('id_jawaban','=',$id)->count();
        $rate=0;
        foreach($jumlah as $jum){
            $rate=$rate+$jum->rating;
        }
        
        $jawaban->rating=$rate/$j;
        $jawaban->save();

        return redirect()->route('pertanyaan.show', [$jawaban->id_pertanyaan])->with('message', 'Rating berhasil direkam');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
