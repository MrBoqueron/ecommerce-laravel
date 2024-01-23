@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pedidos</h1>
@stop

@section('content')

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <th scope="row">{{ $pedido->id }}</th>
                    <td>{{ $pedido->user->name }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->estado  }}</td>
                    <td><a href="{{ route('admin.pedido.ver', $pedido->id) }}" class="btn btn-success">Ver</a></td>
                    <td><a href="{{ route('admin.pedido.destroy', $pedido->id) }}" class="btn btn-danger">Eliminar</a></td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

