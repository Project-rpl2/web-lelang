<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lelang;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pelelang;
use Auth;
class LelangsController extends Controller
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
        $lelangs = Lelang::with('tb_barangs')->paginate();
        return view('Lelang.index',compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('Lelang.create',compact('barangs'));
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
            'tb_barangs_id' => 'required',
            'tgl_lelang' => 'required',
            'status'=>'required',
            'users_id'=>'required',
        ]);
        // Lelang::create($request->all());
        $lelangs = Lelang::create([
        'tb_barangs_id'=>$request["tb_barangs_id"],
        'tgl_lelang'=>$request["tgl_lelang"],
        'status'=>$request["status"],
        'users_id'=>Auth::id()
        ]);
        return redirect('lelang')->with('status','data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        $barangs = Barang::all();
        $pelelangs = Pelelang::all();
        return view('Lelang.show',compact('barangs','lelang','pelelangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lelang = Lelang::findorfail($id);
        $pelelangs = Pelelang::all();
        return view('Lelang.edit',compact('lelang','pelelangs'));
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
        $lelang = Lelang::find($id);
        $lelang->tgl_lelang = $request->tgl_lelang;
        $lelang->status = $request->status;
        $lelang->pelelangs_id = $request->pelelangs_id;
        $lelang->pemenang = $request->pemenang;
        $lelang->save();
        return redirect('lelang')->with('status','data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lelang::destroy($id);
        return redirect('lelang')->with('status','data berhasil di hapus');
    }
}
