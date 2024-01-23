@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h3>Usuarios</h3>
    <p>Lista de todos los usuarios</p>
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th
                            scope="row"
                        >
                            {{ $user->id }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        <td>
                            <a
                                href="{{ route('admin.edituser', $user->id) }}"
                                class="btn btn-primary"
                            >
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop

