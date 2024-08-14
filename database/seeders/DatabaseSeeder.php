<?php

namespace Database\Seeders;


use App\Models\Batch;
use App\Models\School;
use App\Models\BatchSchool;
use App\Models\Major;
use App\Models\BatchSchoolMajor;
use App\Models\User;
use App\Models\Student;
use App\Models\ScheduleOfActivity;
use App\Models\Mentor;
use App\Models\Activity;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 

        // School::create([
        //     'name' => 'smkn 2',
        // ]);

        // $this->call([
        //     SchoolSeeder::class,
        //     UserSeeder::class
        // ]);

        User::factory(100)->create();
        School::factory(20)->create();
        Batch::factory(20)->create();
        BatchSchool::factory(20)->create();
        Major::factory(20)->create();
        BatchSchoolMajor::factory(20)->create();
        Student::factory(20)->create();
        ScheduleOfActivity::factory(20)->create();
        Mentor::factory(20)->create();
        Activity::factory(20)->create();

    }
}
