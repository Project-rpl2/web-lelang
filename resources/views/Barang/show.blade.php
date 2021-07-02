@extends('layouts.apss')

@section('title','Tampil data')

@section('content')
<div class="container-fluid">
<h1>Detail Data Barang : {{$barangs->nama_barang}}</h1>
<div class="row">
    <div class="col-sm-6">
    <img src="/gambarbarang/{{$barangs->gambar}}" class="card-img w-100" alt="">
    </div>
    <div class="col-sm-6">
    <h1>Nama Barang : {{$barangs->nama_barang}}</h1>
    <p>Tanggal Buat : {{$barangs->tgl}}</p>
    <p>Harga Awal : {{number_format($barangs->harga_awal)}}</p>
    <p>Deskripsi Barang : {{$barangs->deskripsi_barang}}</p>
    </div>
</div>
<a href="/barangs" class="btn btn-warning my-3">Back</a>
</div>
</div>
@endsection