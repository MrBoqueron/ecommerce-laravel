@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col">
        <h1 class="m-0 text-dark">Crear Producto</h1>
    </div>
</div>
@stop

@section('content')

    <form action="{{ route('admin.productos.store') }}	" method="post" enctype="multipart/form-data" >
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre" />
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-control" name="categoria" id="categoria">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca" id="marca" aria-describedby="helpId" placeholder="Marca" />
    </div>  

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" aria-describedby="helpId" placeholder="Stock" />
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio" />
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen" />
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#descripcion').summernote();
        });
    </script>
@endsection