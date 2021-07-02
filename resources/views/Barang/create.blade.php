@extends('layouts.apss')

@section('title','Create Barang')

@section('content')
<h1 class="mt-2">Create Barang</h1>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/barangs/store" method="POST">
        @csrf
        <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
        </div>
        <div class="mb-3">
        <label for="tgl" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tgl" name="tgl">
        </div>
        <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
        <label for="harga_awal" class="form-label">Harga Awal</label>
        <input type="text" class="form-control" id="harga_awal" name="harga_awal">
        </div>
        <div class="mb-3">
        <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
        <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang">
        </div>
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
</div>
@endsection