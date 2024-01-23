@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col">
        <h1 class="m-0 text-dark">Producto</h1>
    </div>
</div>
@stop

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="card-img-top" style="width: 300px; height: auto;">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{!! nl2br(e($producto->descripcion)) !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <a href="{{ route('admin.productos.destroy', $producto->id) }}" class="btn btn-danger">Eliminar  </a>
</div>
@stop