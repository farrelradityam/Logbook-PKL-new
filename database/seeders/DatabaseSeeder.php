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

        // Student::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 

        // Student::factory()->create([
        //     'name' => 'admin',
        //     'phone_number' => '038372748',

        // ]);

        // School::create([
        //     'name' => 'smkn 2',
        // ]);

        // $this->call([
        //     SchoolSeeder::class,
        //     UserSeeder::class
        // ]);

        User::factory(50)->create();
        School::factory(50)->create();
        Batch::factory(50)->create();
        BatchSchool::factory(50)->create();
        Major::factory(50)->create();
        BatchSchoolMajor::factory(50)->create();
        Student::factory(50)->create();
        ScheduleOfActivity::factory(50)->create();
        Mentor::factory(50)->create();
        Activity::factory(50)->create();

    }
}
