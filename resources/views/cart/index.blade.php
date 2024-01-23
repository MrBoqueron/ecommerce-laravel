@extends('layouts.app')

@section('title', 'Tienda x - Carrito')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>Carrito</h1>
        </div>
    </div>

    <div class="row mt-15">

        <div class="col">
            @error('cart')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        @if(!empty($cart))
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $total = 0;
                    @endphp

                    @foreach ($cart as $item)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $item['nombre'] }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>{{ $item['cantidad'] * $item['precio'] }}</td>
                    </tr>

                    @php
                        $total += $item['cantidad'] * $item['precio'];
                    @endphp

                    @endforeach
                </tbody>
            </table>
        </div>

        <p>Total: ${{ $total }}</p>

        @if (Auth::check())
        <a href="{{ route('cart.checkout') }}" class="btn btn-success">Pagar</a>
        @else
        <p>Por favor inicia sesión para realizar el pedido.</p>
        @endif

        @else
        <p>El carrito está vacío.</p>
        @endif

    </div>
</div>
@endsection