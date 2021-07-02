@extends('layouts.apss')

@section('title','Detail Data Lelang')

@section('content')
<div class="container-fluid">
<h1>Detail Data Barang : {{$lelang->tb_barangs->nama_barang}}</h1>
<div class="row">
    <div class="col-sm-6">
    <img src="/gambarbarang/{{$lelang->tb_barangs->gambar}}" class="card-img w-100" alt="">
    @if (Auth::check())
    @if (Auth::user()->role == 'petugas')
    <a href="/lelang" class="btn btn-warning my-3">Back</a>
    @endif
    @if (Auth::user()->role == 'masyarakat')
    <a href="/pelelang" class="btn btn-warning my-3">Back</a>
    @endif
    @endif
    </div>
    <div class="col-sm-6">
    @if (Auth::check())
        @if (Auth::user()->role == 'petugas')
        <h1>Nama Barang : {{$lelang->tb_barangs->nama_barang}}</h1>
        <p>Tanggal Buat : {{$lelang->tb_barangs->tgl}}</p>
        <p>Harga Awal : {{number_format($lelang->tb_barangs->harga_awal)}}</p>
        <p>Deskripsi Barang : {{$lelang->tb_barangs->deskripsi_barang}}</p>
        @endif
        @if (Auth::user()->role == 'masyarakat')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($lelang->status == 'ditutup')
        {{"no lelang was closed"}}
        @else
        <form method="POST" action="/pelelang/store">
            @csrf
            <div class="mb-3">
            <label for="tb_barangs_id" class="form-label">Barang</label>
            <input type="text" readonly class="form-control" id="tb_barangs_id" name="tb_barangs_id" value="{{$lelang->tb_barangs->nama_barang}}">
            </div>
            {{-- <div class="mb-3">
            <label for="tb_lelangs_id" class="form-label">Status Barang</label>
            <input type="text" readonly class="form-control" id="tb_lelangs_id" name="tb_lelangs_id" value="{{$lelang->status}}">
            </div> --}}
            <div class="mb-3">
            <label for="users_id" class="form-label">Pelelang</label>
            <input type="text" class="form-control" id="users_id" readonly name="users_id" value="{{Auth::user()->username}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control @error('bid') is-invalid @enderror" id="bid" name="bid" min="{{$lelang->tb_barangs->harga_awal}}">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form> 
        @endif
        @endif
    @endif
    </div>
</div>
</div>
</div>
@endsection