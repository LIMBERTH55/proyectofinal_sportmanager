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

            'equipo_local' => $this->faker->randomElement([
                'Real Madrid',
                'Barcelona',
                'Liverpool',
                'Manchester City',
                'Bayern Munich',
                'Milan',
                'Juventus'
            ]),

            'equipo_visitante' => $this->faker->randomElement([
                'Chelsea',
                'Arsenal',
                'Inter',
                'Napoli',
                'Sevilla',
                'Benfica',
                'Porto'
            ]),

            'fecha' => $this->faker->date(),

            'hora' => $this->faker->time('H:i:s'),

            'lugar' => $this->faker->city(),

            'estado' => $this->faker->randomElement([
                'programado',
                'en_juego',
                'finalizado'
            ]),

            'marcador_local' => $this->faker->numberBetween(0, 5),

            'marcador_visitante' => $this->faker->numberBetween(0, 5),
        ];
    }
}