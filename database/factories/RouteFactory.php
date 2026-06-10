<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Route;
use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Route>
 */
class RouteFactory extends Factory
{
    protected $model = Route::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_type_id' => ServiceType::factory(),
            'origin_id' => Location::factory(),
            'destination_id' => Location::factory(),
        ];
    }
}
