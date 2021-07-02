@extends('layouts.apss')

@section('title','Halaman Utama')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang Di Halaman Home') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>ini Adalah halaman home</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection