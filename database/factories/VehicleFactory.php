<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'user_ID' => \App\Models\User::factory()->create()->id,
            'vehicle_name' => $this->faker->word,
            'vehicle_type' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(1, 10),
            'availability' => $this->faker->boolean,
        ];
    }
}
