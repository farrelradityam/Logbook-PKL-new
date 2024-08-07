<?php

namespace Database\Factories;

use App\Models\BatchSchool;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BatchSchoolMajor>
 */
class BatchSchoolMajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'batch_school_id' => BatchSchool::inRandomOrder()->first()->id,
            'major_id' => Major::inRandomOrder()->first()->id
        ];
    }
}
