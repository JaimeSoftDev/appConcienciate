<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Psh>
 */
class PshFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellido1' => fake()->lastName(),
            'apellido2' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'dni' => fake()->numberBetween(10000000, 99999999) . strtoupper(fake()->randomLetter()),
            'sexo' => fake()->randomElement(['hombre', 'mujer']),
            'estado_civil' => fake()->randomElement(['soltero', 'casado', 'viudo', 'divorciado']),
        ];
    }
}
