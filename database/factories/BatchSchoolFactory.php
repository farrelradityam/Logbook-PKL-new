<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BatchSchool>
 */
class BatchSchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id' => School::inRandomOrder()->first()->id,
            'batch_id' => Batch::inRandomOrder()->first()->id
        ];
    }
}
