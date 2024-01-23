@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Roles</h1>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Permisos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <th scope="row">
                    {{ $role->id }}
                </th>
                <td>
                    {{ $role->name }}
                </td>
                <td>
                    @foreach ($role->permissions as $permission)
                    <span class="badge rounded-pill bg-success">{{ $permission->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop