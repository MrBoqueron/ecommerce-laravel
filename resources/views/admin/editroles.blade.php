@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')

<form action="POST" action="{{ route('admin.roles.update', $role->id) }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="permissions" class="form-label">Permisos</label>

        @foreach ($permissions as $permission)
        <div class="form-check">
            <input type="checkbox" name="permissions[]" id="permissions" class="form-check-input" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
            <label for="permissions" class="form-check-label">{{ $permission->name }}</label>
        </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

@stop