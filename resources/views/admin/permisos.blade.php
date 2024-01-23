@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permiso)
            <tr>
                <th scope="row">{{ $permiso->id }}</th>
                <td>{{ $permiso->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop