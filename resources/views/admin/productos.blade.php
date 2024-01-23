@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col">
        <h1 class="m-0 text-dark">Productos</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('admin.productos.create') }}" class="btn btn-success">Crear</a>
    </div>
</div>
@stop

@section('content')

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th class="col">Marca</th>
                <th class="col">Stock</th>
                <th class="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->id_categoria }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td><a href="{{ route('admin.producto.ver', $producto->id) }}" class="btn btn-success">Ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@stop