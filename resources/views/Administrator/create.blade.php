@extends('layouts.apss')

@section('title','Create Data User')

@section('content')
<div class="container">
<h2>Create Data User</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/administrator/store" method="POST">
    @csrf
    <div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email"name="email">
    </div>
    <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">No Telpon</label>
        <input type="text" class="form-control" id="telp" name="telp">
        </div>
    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    </div>
    {{-- <div class="mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div> --}}
    <div class="mb-3">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    <select class="form-select" name="role" id="role" aria-label="Default select example">
    <option disabled>Pilih Role</option>
    <option>Administrator</option>
    <option>Masyarakat</option>
    <option>Petugas</option>
    </select>
    </div>
    <button type="submit" class="btn btn-primary my-3">Submit</button>
</form>
</div>
@endsection