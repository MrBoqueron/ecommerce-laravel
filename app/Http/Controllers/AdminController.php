<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('users', 'roles')); 
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edituser', compact('user', 'roles')); 
    }

    public function update_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $user->syncRoles($request->input('role', []));

        return redirect()->route('admin.users.index');
    }

    public function destroy_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function permisos()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.permisos', compact('roles', 'permissions')); 
    }

    public function permisos_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles($request->input('role', []));
        return redirect()->route('admin.users.index');
    }

    public function permisos_destroy($id)
    {
        $user = User::find($id);
        $user->syncRoles([]);
        return redirect()->route('admin.users.index');
    }

    public function roles()
    {
        $roles = Role::all();
        return view('admin.roles', compact('roles')); 
    }

    public function roles_edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.editroles', compact('role', 'permissions'));
    }

    public function roles_update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->input('permission', []));
        return redirect()->route('admin.roles.index');
    }

    public function ver_categorias()
    {
        $categorias = \App\Models\Categoria::all();
        return view('admin.categorias', compact('categorias'));
    }

    public function create_categorias()
    {
        return view('admin.create_categorias');
    }

    public function store_categorias()
    {
        \App\Models\Categoria::create(request()->all());
        return redirect()->route('admin.categorias')->with('success', 'Categoría creada con éxito');

    }

    public function edit_categorias($id)
    {
        $categoria = \App\Models\Categoria::find($id);
        return view('admin.editar_categorias', compact('categoria'));
    }

    public function update_categorias($id)
    {
        $categoria = \App\Models\Categoria::find($id);
        $categoria->update(request()->all());
        return redirect()->route('admin.categorias')->with('success', 'Categoría actualizada con éxito');
    }

    public function destroy_categorias($id)
    {
        $productos = \App\Models\Productos::where('id_categoria', $id)->get();
        $productos->each(function ($producto) {
            $producto->delete();
        });
        $categoria = \App\Models\Categoria::find($id);
        $categoria->delete();
        return redirect()->route('admin.categorias')->with('delete', 'Categoría eliminada con éxito');
    }
}
