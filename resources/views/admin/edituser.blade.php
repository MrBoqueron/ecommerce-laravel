@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h3>Usuario {{ $user->name }}</h3>    

    <form action="{{ route('admin.updateuser', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> 
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            @foreach ($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="role[]" id="role" class="form-check-input" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                    <label for="role" class="form-check-label">{{ $role->name }}</label>
                </div>                
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@stop

