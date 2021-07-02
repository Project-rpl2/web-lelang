@extends('layouts.apss')

@section('title','Edit Barang')

@section('content')
<h1>Edit Barang : {{$lelang->tb_barangs->nama_barang}}</h1>
<form method="POST" action="/lelang/update/{{$lelang->id}}">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="tgl_lelang" class="form-label">Tanggal Lelang</label>
        <input type="date" class="form-control" id="tgl_lelang"  name="tgl_lelang" value="{{$lelang->tgl_lelang}}">
    </div>
    <div class="mb-3">
        <label for="users_id" class="form-label">Petugas yang melelangkan</label>
        <input type="text" class="form-control" readonly id="user_id" name="users_id" value="{{Auth::user()->username}}">
    </div>
    <div class="mb-3">
        <label for="pemenang" class="form-label">Pilih Pemenang</label>
            <select class="form-select" name="pemenang">
                @foreach ($pelelangs as $pelelang)
                <option value="{{$pelelang->id}}" disabled>Nama Barang : {{$pelelang->tb_barangs_id}}</option>
                <option value="{{$pelelang->users->username}}">{{$pelelang->users->username}}</option> 
                <option value="{{$pelelang->id}}" disabled>Nominal yg Di lelang : {{$pelelang->bid}}</option> 
                @endforeach
            </select>
        </label>
        </div>
    <div class="mb-3">
        <label for="exampleDataList" class="form-label">Nominal Pemenang Lelang</label>
        <input class="form-control" list="datalistOptions" id="exampleDataList" name="pelelangs_id">
        <datalist id="datalistOptions" name="pelelangs_id">
            @foreach($pelelangs as $pelelang)
            <option value="{{$pelelang->tb_barangs_id}} : {{$pelelang->users->username}} {{number_format($pelelang->bid)}}">
            @endforeach
        </datalist>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Lelang</label>
        <select class="form-select" id="status" name="status">
            <option disabled>{{$lelang->status}}</option>
            <option>dibuka</option>
            <option>ditutup</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection