@extends('layouts.apss')

@section('title','Data User')

@section('content')
<h1>Data User</h1>
<div class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
<a href="/administrator.create" class="btn btn-primary my-3">Create Data User</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <th scope="col">No telpon</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
        @forelse($users as $key => $user)
    <tr>
        <th scope="col">{{$key+1}}</th>
        <td>{{$user->nama_lengkap}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->telp}}</td>
        <td>{{$user->role}}</td>
        <td>
            <a href="/administrator/edit/{{$user->id}}"class="btn btn-success">Edit Data</a>
            <form action="/administrator/delete/{{$user->id}}" onsubmit="return confirm('apakah yakin')" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger my-2">Hapus</button>
            </form>
        </td>
        @empty
        <div class="alert alert-danger">{{"tidak ada data"}}</div>
        @endforelse
    </tr>
    </tbody>
</table>
</div>
@endsection