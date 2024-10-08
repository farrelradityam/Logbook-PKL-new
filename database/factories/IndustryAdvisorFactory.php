<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\ScheduleOfActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IndustryAdvisor>
 */
class IndustryAdvisorFactory extends Factory
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
            'activity_id' => Activity::inRandomOrder()->first()->id,
            'schedule_of_activity_id' => ScheduleOfActivity::inRandomOrder()->first()->id

        ];
    }
}
