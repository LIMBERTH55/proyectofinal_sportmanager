<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Torneo;
use App\Models\Partido;
use Illuminate\Database\Seeder;

class SportManagerSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@sportmanager.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('12345678')
            ]
        );

        Torneo::factory(10)->create([
            'owner_id' => $admin->id
        ])->each(function($torneo){

            Partido::factory(5)->create([
                'torneo_id' => $torneo->id
            ]);
        });
    }
}
