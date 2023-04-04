<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $users = User::get();
    return view('user.index', compact('users'));
    }

    public function create()
    {
        return view ('user.create');
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
            'username'=>['required','unique:users,username', 'max:30'],
            'email'=>['required','unique:users,email', 'max:30'],
            'password'=>['required'],
            'foto'=>['mimes:jpeg,png,jpg'],
        ]);

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath,$namafoto);
            }
        else{
            $namafoto ='none.png';
        }

        if($request->get('pangkat')){
            $pangkat=$request->get('pangkat');
        }else{
            $pangkat=0;
        }

        User::create([
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'rating'=>0,
            'password'=>Hash::make($request->get('password')),
            'pangkat'=>$pangkat,
            'foto'=>$namafoto,
            ]);

        return redirect()->route('user.index')->with('message','user baru berhasil dibuat');
    }

    public function edit($id){
        $users = User::find($id);
        return view('user.edit',compact('users'));
    }
    
    public function update(Request $request, $id){
       
        $user = User::find($id);
        $username=$user->username;
        $email=$user->email;

        $this->validate($request,[
            'username'=>['required','unique:users,username,'.$username.',username', 'max:30'],
            'email'=>['required','unique:users,email,'.$email.',email', 'max:30'],
            'foto'=>['mimes:jpeg,png,jpg'],
        ]);


            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
                $destinationPath = public_path('/foto');
                $foto->move($destinationPath,$namafoto);
                }
            else{
                $namafoto ='none.png';
            }

            if($request->get('password')){
                $pw = Hash::make($request->get('password'));
                }
            else{
                $pw = Hash::make($user->password);
            }

            $user->username=$request->get('username');
            $user->email=$request->get('email');
            $user->password=$pw;
            $user->pangkat=$request->get('pangkat');
            $user->foto=$namafoto;
            $user->save();

        return redirect()->route('user.index')->with('message','user berhasil diubah');
    }

    
    public function destroy($id)
    {
    $user = User::find($id);
    $user->delete();

    return redirect()->route('user.index')->with('message','user berhasil dihapus');
    }
}
