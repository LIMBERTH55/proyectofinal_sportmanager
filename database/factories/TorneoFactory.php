<?php

namespace Database\Factories;

use App\Models\Torneo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Torneo>
 */
class TorneoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement([
                'planificado',
                'activo',
                'finalizado'
            ]),
            'owner_id' => User::factory()
        ];
    }
}
