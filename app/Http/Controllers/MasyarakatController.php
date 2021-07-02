<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Auth;

class MasyarakatController extends Controller
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

    public function masyarakat()
    {
        // if($request->session()->has('user'))
        // {
        // dd($this->session_data('user'));
        // }
        $users = User::all();
        return view('Masyarakat.masyarakat');
    }
}