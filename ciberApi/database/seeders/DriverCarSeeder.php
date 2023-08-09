<?php

namespace Database\Seeders;

use App\Models\DriverCar;
use Illuminate\Database\Seeder;

class DriverCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DriverCar::factory()
            ->count(600)
            ->create();
    }
}
