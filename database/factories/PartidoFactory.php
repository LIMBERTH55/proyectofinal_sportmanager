<?php

namespace Database\Factories;

use App\Models\Torneo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartidoFactory extends Factory
{
    public function definition(): array
    {
        return [

            'torneo_id' => Torneo::factory(),

            'equipo_local' => fake()->randomElement([
                'Real Madrid',
                'Barcelona',
                'Liverpool',
                'Manchester City',
                'PSG',
                'Bayern Munich',
                'Milan',
                'Juventus'
            ]),

            'equipo_visitante' => fake()->randomElement([
                'Chelsea',
                'Arsenal',
                'Inter',
                'Borussia Dortmund',
                'Napoli',
                'Sevilla',
                'Benfica',
                'Porto'
            ]),

            'fecha' => fake()->date(),

            'hora' => fake()->time('H:i:s'),

            'lugar' => fake()->city(),

            'estado' => fake()->randomElement([
                'programado',
                'en_juego',
                'finalizado'
            ]),

            'responsable_id' => User::inRandomOrder()->value('id'),

            'marcador_local' => fake()->numberBetween(0, 5),

            'marcador_visitante' => fake()->numberBetween(0, 5),

        ];
    }
}