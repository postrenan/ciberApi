<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DriverCar;

class DriverCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $model = DriverCar::class;
    public function definition(): array
    {
        return [
            'car_id' => $this->faker->numberBetween(1, 43117),
            'driver_id' => $this->faker->numberBetween(1610, 2291)
        ];
    }
}
