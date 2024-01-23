@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col">
        <h1 class="m-0 text-dark">Categorias</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-success">Crear</a>
    </div>
</div>
@stop

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <th scope="row">{{ $categoria->id }}</th>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>   
                </tr>               
            @endforeach
        </tbody>
    </table>
</div>


@stop