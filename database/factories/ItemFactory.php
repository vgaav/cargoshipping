<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'item_name' => $this->faker->word,
            'item_client' => $this->faker->company,
            'item_weight' => $this->faker->randomFloat(2, 0, 1000),
            'item_from' => $this->faker->city,
            'item_destination' => $this->faker->city,
            'item_pickup_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'item_dropoff_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'item_quote' => $this->faker->randomFloat(2, 100, 10000),
            'item_image' => $this->faker->imageUrl(),
            'item_length' => $this->faker->randomFloat(2, 0, 100),
            'item_width' => $this->faker->randomFloat(2, 0, 100),
            'item_height' => $this->faker->randomFloat(2, 0, 100),
            'item_status' => $this->faker->word,
            'item_current_bids' => $this->faker->numberBetween(0, 100),
        ];
    }
}

