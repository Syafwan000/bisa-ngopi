@extends('auth.layout.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-12 img-container">
            <div class="container img-wrapper">
                <img class="img-coffee" src="{{ asset('img/banner.png') }}" alt="Coffee">
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 d-flex justify-content-center align-items-center">
            <livewire:login-view />
        </div>
    </div>
</div>

@endsection