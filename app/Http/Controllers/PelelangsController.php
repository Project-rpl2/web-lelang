<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelelang;
use App\Models\Lelang;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class PelelangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
    $pelelangs = Pelelang::all();
    $lelangs = Lelang::all();
    return view('Pelelang.index',compact('pelelangs','lelangs'));
    }

    public function pelelang(){
    $pelelangs = Pelelang::all();
    return view('Pelelang.pelelang',compact('pelelangs'));
    }

    public function search(Request $request){
        $search = $request->search;
        $pelelangs = DB::table('pelelangs')->where('tb_barangs_id','like',"%".$search."%")->
        paginate();
        return view('Pelelang.pelelang',compact('pelelangs'));
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
        $request->validate([
            'tb_barangs_id'=>'required',
            // 'tb_lelangs_id'=>'required',
            'users_id'=>'required',
            'bid' => 'required',
        ]);
        // Pelelang::create($request->all());
        $pelelangs = Pelelang::create([
            'tb_barangs_id'=>$request["tb_barangs_id"],
            //'tb_lelangs_id'=>$request["tb_lelangs_id"],
            'bid'=>$request["bid"],
            'users_id'=>Auth::id()
        ]);
        return redirect('pelelang')->with('status','berhasil melelang');
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
        Pelelang::destroy($id);
        return redirect('pelelang.pelelang')->with('status','sudah kalah');
    }
}
