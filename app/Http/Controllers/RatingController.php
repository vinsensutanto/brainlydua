<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
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
        $user=Auth::user()->id;
        $conn=mysqli_connect("localhost","root","","otak");
        $exists=mysqli_query($conn,"SELECT * FROM ratings WHERE id_user=$user AND id_jawaban=$id");
        $this->validate($request, [
            'rating'=>'required',
        ]);

        $jawaban = Jawaban::find($id);
        
        // $exist=Rating::where('id_user', '=', Auth::user()->id)->where('id_jawaban', '=', $jawaban->id_jawaban); 
        if(mysqli_num_rows($exists)>0){
            return redirect()->route('pertanyaan.show', [$jawaban->id_pertanyaan])->with('message', 'Rating invalid');
        } else {
            Rating::create([
                'id_user'=>Auth::user()->id,
                'id_jawaban'=>$id,
                'rating'=>$request->get('rating'),
            ]);
        $jumlah=mysqli_query($conn,"SELECT rating FROM ratings WHERE id_jawaban= $id");
        $j=Rating::where('id_jawaban','=',$id)->count();
        $rate=0;
        foreach($jumlah as $jum){
            $rate=$rate+$jum['rating'];
        }
        if($j==0){
            $jawaban->rating=$request->get('rating');
            $jawaban->save();
        }else{
        $jawaban->rating=round($rate/$j,2);
        $jawaban->save();
        }
        
        $finalrate=Jawaban::where('id_user','=',$jawaban->user->id)->sum('rating');
        $jawaban->user->rating=$finalrate;
        $jawaban->user->save();

        
        $pertanyaan=Pertanyaan::find($jawaban->id_pertanyaan);
        if($pertanyaan->status=="dijawab"){
            if(round($rate/$j,2)>=4 && $j>=2){
            $pertanyaan->status="terjawab";
            $pertanyaan->save();
            }
        }elseif($pertanyaan->status=="terjawab"){
            if(round($rate/$j,2)<4 || $j<2){
                $pertanyaan->status="dijawab";
                $pertanyaan->save();
                }
        }

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

    public function ratingcount($id)
    {
        $usercount=Rating::where('id_jawaban','=',$id)->count();
        echo $usercount;
    }
}
