<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Location>
 */
class LocationFactory extends Factory
{
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
            'type' => fake()->randomElement(['cidade', 'distrito', 'terminal', 'bairro']),
            'province_id' => Province::factory(),
        ];
    }
}
