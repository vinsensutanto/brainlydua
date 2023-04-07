<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['edit', 'update']]);
    }

    public function index()
    {
        if(Auth::user()->pangkat=="admin"){
            $users = User::get();
            return view('otakers.index', compact('users'));
        }
    }

    public function profile($id){
        $users = User::find($id);
        return view('otakers.profile',compact('users'));
    }

    public function create()
    {
        if(Auth::user()->pangkat=="admin"){
        return view ('otakers.create');
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
        $this->validate($request,[
            'username'=>['required','unique:users,username', 'max:30'],
            'email'=>['required','unique:users,email', 'max:30'],
            'password'=>['required'],
            'foto'=>['mimes:jpeg,png,jpg'],
        ]);

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $namafoto = time().$request->get('id_user').'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/fotouser');
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

    public function show()
    {

    }

    public function edit($id){
        if(Auth::user()->pangkat=="admin" || (Auth::check() && Auth::user()->id==$id)){
            $users = User::find($id);
            return view('otakers.edit',compact('users'));
        }else{
            return redirect()->back();
        }
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::user()->pangkat=="admin"){   
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
                $destinationPath = public_path('/fotouser');
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
    }

    
    public function destroy($id)
    {
        if(Auth::user()->pangkat=="admin"){
    $user = User::find($id);
    $user->delete();

    return redirect()->route('user.index')->with('message','user berhasil dihapus');
    }
    }
}
