<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@sportmanager.com'
            ],
            [
                'name' => 'Administrador',
                'password' => Hash::make('12345678')
            ]
        );

        $admin->assignRole('Administrador');
    }
}