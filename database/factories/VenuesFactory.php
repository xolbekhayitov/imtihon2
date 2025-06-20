<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venues>
 */
class VenuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_service' => $this->faker->unique()->word(),
            'general_information' => $this->faker->unique()->word(),
            'workflows' => $this->faker->unique()->word(),
            'trends' => $this->faker->unique()->word(),
            'lifehacks' => $this->faker->unique()->word(),
        ];
    }
}
