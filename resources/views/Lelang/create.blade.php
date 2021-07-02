@extends('layouts.apss')

@section('title','Create Data Lelang')

@section('content')
<h1>Create Data Lelang</h1>
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/lelang/store">
    @csrf
    <div class="mb-3">
    <label for="tb_barangs_id" class="form-label">Pilih Barang</label>
    <select class="form-select" id="tb_barangs_id" name="tb_barangs_id" aria-label="Default select example">
        <option disabled>Pilih Menu</option>
        @forelse($barangs as  $barang)
        <option value="{{$barang->id}}">{{$barang->nama_barang}}</option>
        @empty
            {{"tidak ada"}}
        @endforelse
    </select>
    </div>
    <div class="mb-3">
        <label for="tgl_lelang" class="form-label">Tanggal Lelang</label>
        <input type="date" class="form-control" id="tgl_lelang"  name="tgl_lelang">
    </div>
    <div class="mb-3">
        <label for="users_id" class="form-label">Petugas yang melelangkan</label>
        <input type="text" class="form-control" readonly id="user_id" name="users_id" value="{{Auth::user()->username}}">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Lelang</label>
        <select class="form-select" id="status" name="status">
            <option disabled>status lelang</option>
            <option>dibuka</option>
            <option>ditutup</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection