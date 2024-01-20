@extends('layouts.home')
@section('content')

<div class="text-center text-white position-relative z-index-1 font-bruno">
    <div class="d-flex align-items-center justify-content-center mb-4">
        <hr class="flex-grow-1 border-white thick-line">
        <span class="mx-2 display-4">MMS</span>
        <hr class="flex-grow-1 border-white thick-line">
    </div>
    <h1>MAISONNEUVE</h1>
    <h2>MÉDIAS</h2>
    <h2>SOCIAUX</h2>
    <hr class="flex-grow-1 border-white mt-5 thick-line">
    <a href="{{ route('login') }}" class="btn btn-outline-warning btn-lg mt-5">Login</a>
</div>

@endsection