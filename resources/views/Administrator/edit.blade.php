@extends('layouts.apss')

@section('title','edit user')

@section('content')
<form action="/administrator/update/{{$user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$user->nama_lengkap}}">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email"name="email" value="{{$user->email}}">
    </div>
    <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">No Telpon</label>
        <input type="text" class="form-control" id="telp" name="telp" value="{{$user->telp}}">
        </div>
    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
    </div>
    {{-- <div class="mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div> --}}
    <div class="mb-3">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    <select class="form-select" name="role" id="role" aria-label="Default select example">
    <option disabled>{{$user->role}}</option>
    <option>Masyarakat</option>
    <option>Petugas</option>
    <option>Administrator</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary my-3">Submit</button>
</form>
@endsection