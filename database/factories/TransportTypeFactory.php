<?php

namespace Database\Factories;

use App\Models\TransportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransportType>
 */
class TransportTypeFactory extends Factory
{
    protected $model = TransportType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'capacity' => fake()->numberBetween(12, 100),
        ];
    }
}
