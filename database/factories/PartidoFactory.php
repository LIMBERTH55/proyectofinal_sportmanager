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
                        'equipo_local' => $this->faker->randomElement([
                'Bayern Munich',
                'Milan',
                'Juventus'
            ]),

            'equipo_visitante' => fake()->randomElement([
                'Chelsea',
                'Arsenal',
                'Inter',
                        'equipo_visitante' => $this->faker->randomElement([
                'Napoli',
                'Sevilla',
                'Benfica',
                'Porto'
            ]),

            'fecha' => fake()->date(),

            'hora' => fake()->time('H:i:s'),
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
            'marcador_local' => fake()->numberBetween(0, 5),

            'marcador_visitante' => fake()->numberBetween(0, 5),

        ];
    }
}