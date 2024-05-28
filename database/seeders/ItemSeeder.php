<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'item_name' => 'Laptop',
            'item_client' => 'John Doe',
            'item_weight' => 2.5,
            'item_from' => 'New York',
            'item_destination' => 'Los Angeles',
            'item_pickup_time' => '2024-06-01 09:00:00',
            'item_dropoff_time' => '2024-06-02 18:00:00',
            'item_quote' => 1000.00,
            'item_image' => 'path_to_image.jpg',
            'item_length' => 15.5,
            'item_width' => 10.2,
            'item_height' => 5.0,
            'item_status' => 'Pending',
            'item_current_bids' => 0,
        ]);

        Item::create([
            'item_name' => 'Smartphone',
            'item_client' => 'Jane Doe',
            'item_weight' => 0.3,
            'item_from' => 'San Francisco',
            'item_destination' => 'Seattle',
            'item_pickup_time' => '2024-06-03 10:00:00',
            'item_dropoff_time' => '2024-06-04 16:00:00',
            'item_quote' => 500.00,
            'item_image' => 'path_to_image.jpg',
            'item_length' => 6.0,
            'item_width' => 3.2,
            'item_height' => 0.5,
            'item_status' => 'In Transit',
            'item_current_bids' => 3,
        ]);
    }
}
