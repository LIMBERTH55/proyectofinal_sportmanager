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

            'crear partido',
            'editar partido',
            'eliminar partido',

            'asignar partido',

            'comentar',

            'gestionar usuarios',
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

        // Administrador
        $admin->givePermissionTo(Permission::all());

        // Organizador
        $organizador->givePermissionTo([
            'ver torneo',
            'crear torneo',
            'editar torneo',
            'gestionar miembros',
            'crear partido',
            'editar partido',
            'asignar partido',
            'comentar'
        ]);

        // Entrenador
        $entrenador->givePermissionTo([
            'ver torneo',
            'editar partido',
            'comentar'
        ]);

        // Invitado
        $invitado->givePermissionTo([
            'ver torneo',
            'comentar'
        ]);
    }
}