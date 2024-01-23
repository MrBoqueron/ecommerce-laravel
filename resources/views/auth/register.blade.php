@extends('layouts.app')

@section('title', 'Tienda x - Registro') 

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Registro</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h2>Información personal</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <h2>Información de contacto</h2>
                    <div class="mb-3">
                        <label for="pais" class="form-label">Pais</label>
                        <input type="text" name="pais" id="pais" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>  
                    <div class="mb-3">
                        <label for="provincia" class="form-label">Provincia</label>
                        <input type="text" name="provincia" id="provincia" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cp" class="form-label">C.P.</label>
                        <input type="text" name="cp" id="cp" class="form-control" value="{{ old('address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="calle" class="form-label">Calle</label>
                        <input type="text" name="calle" id="calle" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" id="numero" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
    </div>
@endsection