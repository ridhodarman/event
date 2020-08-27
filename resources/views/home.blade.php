@php
if (Auth::check())
{
    if (Auth::user()->role == 99) {
        header("Location: admin_index");
        die();
    }
}
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br/>
                    Anda sudah berhasil register akun, silahkan <b>hubungi admin</b> untuk verifikasi status sebagai agen.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
