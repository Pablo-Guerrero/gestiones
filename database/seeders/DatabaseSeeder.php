<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // Crear roles y asignar permisos
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(['edit articles', 'delete articles', 'publish articles', 'unpublish articles']);

        $roleEditor = Role::create(['name' => 'editor']);
        $roleEditor->givePermissionTo(['edit articles', 'publish articles']);
    }
}

