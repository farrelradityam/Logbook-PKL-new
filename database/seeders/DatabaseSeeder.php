<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\BatchSchool;
use App\Models\User;
use App\Models\School;
use App\Models\Mentor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 

        // School::create([
        //     'name' => 'smkn 2',
        // ]);

        // $this->call([SchoolSeeder::class, UserSeeder::class]);

        School::factory(20)->create();
        Batch::factory(20)->create();
        BatchSchool::factory(20)->create();

    }
}
