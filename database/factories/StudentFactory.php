<?php

namespace Database\Factories;

use App\Models\BatchSchoolMajor;
use App\Models\USer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'batch_school_major_id' => BatchSchoolMajor::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
