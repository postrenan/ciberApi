<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;


class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $model = Driver::class;

    public function definition(): array
    {
        $gender = $this->faker->randomElements(['male', 'female'])[0];

        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name'=> $this->faker->lastName,
            'birthday' => $this->faker->date('d-m-Y', '2004-01-01'),
            'gender' => $gender,
            'country' => $this->faker->country,
            'phone_number' => $this->faker->phoneNumber,
            'blood_type' => $this->faker->bloodType(),
        ];
    }
}
