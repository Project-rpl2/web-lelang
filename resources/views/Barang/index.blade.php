@extends('layouts.apss')

@section('title','Data Barang')

@section('content')
<div class="container-fluid">
    <h1>Data Barang</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <a href="/barangs.create" class="btn btn-primary my-3">Create Barang</a>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Gambar</th>
        <th scope="col">Harga Awal</th>
        <th scope="col">Deskripsi Barang</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @forelse ($barangs as $barang)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$barang->nama_barang}}</td>
        <td>{{$barang->tgl}}</td>
        <td><img src="/gambarbarang/{{$barang->gambar}}" width="100" alt=""></td>
        <td>{{number_format($barang->harga_awal)}}</td>
        <td>{{$barang->deskripsi_barang}}</td>
        <td>
        <a href="/barangs/{{$barang->id}}" class="btn btn-info text-white">Show</a>
        <a href="/barangs/edit/{{$barang->id}}" class="btn btn-success">Edit</a>
        <form action="/barangs/destroy/{{$barang->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger my-2 w-75">Hapus</button>
        </form>
        </td>
        @empty
        <div class="alert alert-danger">Tidak ada Data barang</div>
        @endforelse
    </tr>
    </tbody>
</table>
</div>
@endsection
{{-- @section('grid')
@forelse ($barangs as $barang)
<div class="col-md-4 mt-5">
    <div class="card">
    <img src="/gambarbarang/{{$barang->gambar}}" class="card-img-top" style="width: 100%;" alt="">
    <div class="card-body">
        <h3>{{$barang->nama_barang}}</h3>
        <h5>{{$barang->tgl}}</h5>
        <p> {{number_format($barang->harga_awal)}}</p>
        <p>{{$barang->deskripsi_barang}}</p>        
        <a href="/barangs/{{$barang->id}}" class="btn btn-info text-white">Show</a>
        <a href="/barangs/edit/{{$barang->id}}" class="btn btn-success">Edit</a>
        <form action="/barangs/destroy/{{$barang->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger my-2 w-75">Hapus</button>
        </form>
    </div>
</div>
</div>
@empty
<div class="alert alert-danger">Tidak ada Data barang</div>
@endforelse
</div>
@endsection
@endsection --}}