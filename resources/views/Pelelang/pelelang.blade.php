@extends('layouts.apss')

@section('title','Pemilihan Pemenang')

@section('content')
<div class="container-fluid">
    <h1>Pemilihan Pemenang Lelang</h1>
    <form action="/pelelang/search" method="GET">
    <div class="input-group mb-3">
    <input type="text" class="form-control" name="search" value="{{old('search')}}">
    <button class="btn btn-outline-secondary">Search</button>
    </div>
    </form>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Barang yang di lelang</th>
            {{-- <th scope="col">Pelelang</th> --}}
            <th scope="col">jumlah uang</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($pelelangs as $key => $pelelang)
        <tr>
                <td>{{$key+1}}</td>
                <td>{{$pelelang->tb_barangs_id}}</td>
                {{-- <td>{{$pelelang->users->username}}</td> --}}
                <td>{{number_format($pelelang->bid)}}</td>
                <td>
                    <form action="/pelelang/destroy/{{$pelelang->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100">lose</button>
                    </form>
                </td>
            @empty
                <div class="alert alert-danger">Belum ada yang melelang</div>
            @endforelse
        </tr>
        <tr>
        </tbody>
    </table>
</div>
@endsection