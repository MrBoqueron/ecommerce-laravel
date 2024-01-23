@extends('layouts.app')

@section('title', 'Tienda x - Inicio')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Bienvenido a la tienda x</h1>
        </div>
    </div>
    <div class="row mt-15">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <livewire:product-filter>
</div>
</div>
@endSection