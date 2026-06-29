<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ORGANIZADOR
        |--------------------------------------------------------------------------
        */

        $organizador = User::firstOrCreate(
            [
                'email' => 'organizador@sportmanager.com'
            ],
            [
                'name' => 'Organizador',
                'password' => Hash::make('12345678')
            ]
        );

        $organizador->assignRole('Organizador');

        /*
        |--------------------------------------------------------------------------
        | ENTRENADOR
        |--------------------------------------------------------------------------
        */

        $entrenador = User::firstOrCreate(
            [
                'email' => 'entrenador@sportmanager.com'
            ],
            [
                'name' => 'Entrenador',
                'password' => Hash::make('12345678')
            ]
        );

        $entrenador->assignRole('Entrenador');

        /*
        |--------------------------------------------------------------------------
        | INVITADO
        |--------------------------------------------------------------------------
        */

        $invitado = User::firstOrCreate(
            [
                'email' => 'invitado@sportmanager.com'
            ],
            [
                'name' => 'Invitado',
                'password' => Hash::make('12345678')
            ]
        );

        $invitado->assignRole('Invitado');
    }
}