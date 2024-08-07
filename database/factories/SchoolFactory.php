<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $type = $this->faker->randomElement(['SMK', 'SMKN']);

        $number1 = $this->faker->numberBetween(1, 10);

        $number2 = $this->faker->numberBetween(11, 99);

        $city = $this->faker->city;
        
        $street = $this->faker->unique()->streetName();

        return [
            'name' => "{$type} {$number1} {$city}",
            'address' => "Jl. {$street} {$city} No. {$number2}"
        ];
    }
}
