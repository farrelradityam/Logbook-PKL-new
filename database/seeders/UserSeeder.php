<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin super',
            'email' => 'adminsuper@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $admin->assignRole('admin-super');

        $admin = User::create([
            'name' => 'admin pkl',
            'email' => 'adminpkl@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $admin->assignRole('admin-pkl');

        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $siswa->assignRole('siswa');
    }
}
