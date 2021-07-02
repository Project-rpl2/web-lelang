<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $barangs = Barang::all();
        return view('Barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Barang.create');
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
            'nama_barang' => 'required',
            'tgl' => 'required',
            'gambar' => 'required',
            'harga_awal'=>'required',
            'deskripsi_barang'=>'required',
        ]);
        Barang::create($request->all());
        return redirect('barangs')->with('status','barang berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barangs)
    {
        return view('Barang.show',['barangs' => $barangs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($barangs)
    {
        $barangs = Barang::findorfail($barangs);
        return view('Barang.edit',compact('barangs'));
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
        $barangs = Barang::find($id);
        $barangs->nama_barang = $request->nama_barang;
        $barangs->tgl = $request->tgl;
        $barangs->gambar = $request->gambar;
        $barangs->harga_awal = $request->harga_awal;
        $barangs->deskripsi_barang = $request->deskripsi_barang;
        $barangs->save();
        return redirect('barangs')->with('status','data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('barangs')->with('status','data berhasil di hapus');
    }
}
