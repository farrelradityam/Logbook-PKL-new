<?php

namespace Database\Factories;

use App\Models\BatchSchoolMajor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduleOfActivity>
 */
class ScheduleOfActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'batch_school_major_id' => BatchSchoolMajor::inRandomOrder()->first()->id
        ];
    }
}
