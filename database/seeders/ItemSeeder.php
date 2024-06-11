<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Existing seed data
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
            'is_bid_placed' => false,
            'description' => 'A high-performance laptop for business and personal use.',  // Add this line
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
            'is_bid_placed' => false,
            'description' => 'A latest model smartphone with advanced features.',  // Add this line
        ]);

        // New seed data
        Item::create([
            'item_name' => 'Computers Cargo',
            'item_client' => 'DepEd',
            'item_weight' => 450,
            'item_from' => 'Marikina',
            'item_destination' => 'iAcademy, Makati',
            'item_pickup_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'item_dropoff_time' => Carbon::now()->addHours(9)->format('Y-m-d H:i:s'),
            'item_quote' => 8000,
            'item_image' => 'computersCargoImage.jpg',
            'item_length' => null,
            'item_width' => null,
            'item_height' => null,
            'item_status' => 'Ongoing',
            'item_current_bids' => 100,
            'is_bid_placed' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'A shipment of computers for educational purposes.',  // Add this line
        ]);

        Item::create([
            'item_name' => 'Colgate Cargo',
            'item_client' => 'Colgate-Palmolive',
            'item_weight' => 380,
            'item_from' => 'Mckinley Hill, Taguig',
            'item_destination' => 'Puregold, Marikina',
            'item_pickup_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'item_dropoff_time' => Carbon::now()->addHours(15)->format('Y-m-d H:i:s'),
            'item_quote' => 5000,
            'item_image' => 'colgateCargoImage.jpg',
            'item_length' => null,
            'item_width' => null,
            'item_height' => null,
            'item_status' => 'Ongoing',
            'item_current_bids' => 200,
            'is_bid_placed' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => 'A shipment of Colgate products.',  // Add this line
        ]);
    }
}

