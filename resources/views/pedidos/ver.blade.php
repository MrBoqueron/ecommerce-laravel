@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Pedido</h1>
@stop

@section('content')
<h1>Detalles del Pedido #{{ $order->id }}</h1>

@if ($order->orderItems->count() > 0)
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio C/U</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->product->nombre }}</td>
                <td>{{ $orderItem->quantity }}</td>
                <td>{{ $orderItem->price }}</td>
                <td>{{ $orderItem->quantity * $orderItem->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<p>Total del Pedido: ${{ $order->total }}</p>
@else
<p>No hay productos en este pedido.</p>
@endif


@stop