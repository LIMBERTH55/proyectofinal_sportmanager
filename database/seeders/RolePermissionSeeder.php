<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar caché de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | PERMISOS
        |--------------------------------------------------------------------------
        */

        $permisos = [
            'ver torneo',
            'crear torneo',
            'editar torneo',
            'eliminar torneo',
            'gestionar miembros',
            'ver partido',
            'crear partido',
            'editar partido',
            'eliminar partido',
            'comentar',
            'gestionar usuarios'
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'web'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | ROLES
        |--------------------------------------------------------------------------
        */

        $admin = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web'
        ]);

        $organizador = Role::firstOrCreate([
            'name' => 'Organizador',
            'guard_name' => 'web'
        ]);

        $entrenador = Role::firstOrCreate([
            'name' => 'Entrenador',
            'guard_name' => 'web'
        ]);

        $invitado = Role::firstOrCreate([
            'name' => 'Invitado',
            'guard_name' => 'web'
        ]);

        /*
        |--------------------------------------------------------------------------
        | ASIGNAR PERMISOS
        |--------------------------------------------------------------------------
        */

        // Administrador: Obtiene todos los permisos automáticamente
        $admin->givePermissionTo(Permission::all());

        // Organizador: Todos excepto gestionar usuarios
        $organizador->givePermissionTo([
            'ver torneo',
            'crear torneo',
            'editar torneo',
            'eliminar torneo',
            'gestionar miembros',
            'ver partido',
            'crear partido',
            'editar partido',
            'eliminar partido',
            'comentar'
        ]);

        // Entrenador: Ver e interactuar básico
        $entrenador->givePermissionTo([
            'ver torneo',
            'ver partido',
            'comentar'
        ]);

        // Invitado: Solo ver e interactuar básico
        $invitado->givePermissionTo([
            'ver torneo',
            'ver partido',
            'comentar'
        ]);
    }
}