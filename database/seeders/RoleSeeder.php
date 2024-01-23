<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'vendedor']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.permisos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.permisos.edit'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.permisos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'categorias'])->syncRoles([$role2]);

        Permission::create(['name' => 'categorias.create'])->syncRoles([$role2]);

        Permission::create(['name' => 'categorias.edit'])->syncRoles([$role2]);

        Permission::create(['name' => 'categorias.destroy'])->syncRoles([$role2]);

        Permission::create(['name' => 'productos'])->syncRoles([$role2]);

        Permission::create(['name' => 'productos.create'])->syncRoles([$role2]);

        Permission::create(['name' => 'productos.edit'])->syncRoles([$role2]);

        Permission::create(['name' => 'productos.destroy'])->syncRoles([$role2]);

        Permission::create(['name' => 'pedidos'])->syncRoles([$role2]);        

    }
}
