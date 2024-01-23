@extends('layouts.app')

@section('title', 'Tienda x - Tu perfil')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Tu Perfil</h1>
        </div>
    </div>
    <div class="row mt-15">
        <div class="col-12">
            <p>Nombre: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Fecha de creación: {{ $user->created_at }}</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h2>Direccion</h2>
        </div>
        <div class="col-12">
            @if ($direcciones->count() > 0)
                @foreach ($direcciones as $direccion)
                    <p>Pais: {{ $direccion->pais }}</p>
                    <p>Provincia: {{ $direccion->provincia }}</p>
                    <p>Ciudad: {{ $direccion->ciudad }}</p>
                    <p>Calle: {{ $direccion->calle }}</p>
                    <p>Numero: {{ $direccion->numero }}</p>
                    <p>Codigo Postal: {{ $direccion->cp }}</p>
                    <hr>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endSection