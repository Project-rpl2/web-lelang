<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Auth;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function administrator()
    {
        // if($request->session()->has('user'))
        // {
        // dd($this->session_data('user'));
        // }
        return view('Administrator.administrator');
    }
    public function index(){
        $users = User::all();
        return view('Administrator.index',compact('users'));
    }

    public function create(){
        return view('Administrator.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama_lengkap'=>'required','string','max:255',
            'telp'=>'required','string',
            // 'role'=>['required'],
            'username' =>'required', 'string',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        User::create([
            'nama_lengkap'=> $request['nama_lengkap'],
            'telp'=>$request['telp'],
            'role'=> $request['role'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/administrator')->with('status','data admin bertambah');
    }

    public function edit($user){
    $user = User::find($user);
    return view('Administrator.edit',compact('user'));
    }

    public function update(Request $request , $id){
        $user = User::find($id);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('administrator')->with('status','data berhasil di edit');
    }
    public function delete(Request $request ,$id){
        $user = User::find($id);
        $user->delete();
        return redirect ('administrator')->with('status','data berhasil di hapus');
    }
}