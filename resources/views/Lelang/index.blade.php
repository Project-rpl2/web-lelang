@extends('layouts.apss')

@section('title','lelang')

@section('content')
<h1>Data Barang yg Dilelang</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="{{url('lelang.create')}}" class="btn btn-primary my-3">Tambah Lelang Barang</a>
<table class="table table-striped border-dark table table-hover table table-bordered">
    <thead class="bg-primary text-white">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Tanggal Lelang</th>
        <th scope="col">Harga Awal</th>
        <th scope="col">Harga Akhir</th>
        <th scope="col">Pemenang</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @forelse($lelangs as $lelang)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$lelang->tb_barangs->nama_barang}}</td>
        <td>{{$lelang->tgl_lelang}}</td>
        <td>{{number_format($lelang->tb_barangs->harga_awal)}}</td>
        <td>{{$lelang->pelelangs_id}}</td>
        <td>{{$lelang->pemenang}}</td>
        <td>{{$lelang->status}}</td>
        <td>
            <a href="/lelang/edit/{{$lelang->id}}" class="btn btn-success">Edit</a>
            <form action="/lelang/destroy/{{$lelang->id}}" style="display:inline-block;" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
        <td colspan="8" class="text-center">tidak ada data barangnya</td>   
    @endforelse
    </tbody>
</table>
@endsection