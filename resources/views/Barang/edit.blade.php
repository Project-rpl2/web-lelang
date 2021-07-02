@extends('layouts.apss')

@section('title','Edit Barang')

@section('content')
<form action="/barangs/update/{{$barangs->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="nama_barang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$barangs->nama_barang}}">
    </div>
    <div class="mb-3">
    <label for="tgl" class="form-label">Tanggal</label>
    <input type="date" class="form-control" id="tgl" name="tgl" value="{{$barangs->tgl}}">
    </div>
    <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    @if($barangs->gambar)
    <img src="/gambarbarang/{{$barangs->gambar}}" width="100">
    @else
    {{"tidak ada gambar"}}
    @endif
    <input type="file" class="form-control" id="gambar" name="gambar" value="{{$barangs->gambar}}">
    </div>
    <div class="mb-3">
    <label for="harga_awal" class="form-label">Harga Awal</label>
    <input type="text" class="form-control" id="harga_awal" name="harga_awal" value="{{$barangs->harga_awal}}">
    </div>
    <div class="mb-3">
    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
    <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang" value="{{$barangs->deskripsi_barang}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection