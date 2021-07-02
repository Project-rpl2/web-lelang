@extends('layouts.apss')

@section('title','Barang yang dilelang')

@section('content')
<h1>Barang yang dilelang</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
{{-- @forelse($pelelangs as $key => $pelelang)
    
@empty
    <div class="alert alert-danger">Tidak ada Lelangan</div>
@endforelse --}}
@section('grid')
@forelse ($lelangs as $lelang)
<div class="col-md-4 mt-5">
    <div class="card">
    <img src="/gambarbarang/{{$lelang->tb_barangs->gambar}}" class="card-img-top" style="width: 100%;" alt="">
    <div class="card-body">
        <h3>{{$lelang->tb_barangs->nama_barang}}</h3>
        <h5>{{$lelang->tgl_lelang}}</h5>
        <p> {{number_format($lelang->tb_barangs->harga_awal)}}</p>
        <p>{{$lelang->deskripsi_barang}}</p>        
        @if ($lelang->status == 'ditutup')
        <button class="btn btn-danger w-100" disabled>Sudah di tutup</button>
        @else
        <a href="/lelang/{{$lelang->id}}" class="btn btn-primary w-100 text-white">Lelang Sekarang</a>
        @endif
        {{-- <a href="/barangs/edit/{{$lelang->id}}" class="btn btn-success">Edit</a>
        <form action="/barangs/destroy/{{$lelang->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger my-2 w-75">Hapus</button>
        </form> --}}
    </div>
</div>
</div>
@empty
<div class="alert alert-danger">Tidak ada Data barang</div>
@endforelse
</div>
@endsection
@endsection