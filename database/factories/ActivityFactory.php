<?php

namespace Database\Factories;

use App\Models\ScheduleOfActivity;
use App\Models\Student;
use App\Models\User;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->paragraph(),
            'schedule_of_activity_id' => ScheduleOfActivity::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'validated_by_mentor_id' => Mentor::all()->random()->id,
        ];
    }
}
