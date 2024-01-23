@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col">
        <h1 class="m-0 text-dark">Editar Categoria: {{ $categoria->nombre }}</h1>
    </div>
</div>
@stop

@section('content')

<form action="{{ route('admin.categorias.update', $categoria->id) }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $categoria->nombre }}" aria-describedby="helpId" placeholder="Nombre" />
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>

@stop