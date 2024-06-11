<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\VehicleFactory;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        VehicleFactory::new()->count(2)->create();
    }
}
