<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminsuper = User::create([
            'name' => 'admin super',
            'email' => 'adminsuper@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $adminsuper->assignRole('admin-super');

        $superadmin = User::create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $superadmin->assignRole('admin-super');

        $adminpkl = User::create([
            'name' => 'admin pkl',
            'email' => 'adminpkl@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $adminpkl->assignRole('admin-pkl');

        $pembimbingpkl = User::create([
            'name' => 'pembimbing pkl',
            'email' => 'pembimbingpkl@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $pembimbingpkl->assignRole('pembimbing-pkl');
        
        $pembimbingsekolah = User::create([
            'name' => 'pembimbing sekolah',
            'email' => 'pembimbingsekolah@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $pembimbingsekolah->assignRole('pembimbing-sekolah');

        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' =>bcrypt('12345678')
        ]);
        $siswa->assignRole('siswa');

        $adminPkl = Role::firstOrCreate(['name' => 'admin-pkl']);
        $pembimbingPkl = Role::firstOrCreate(['name' => 'pembimbing-pkl']);
        $pembimbingSekolah = Role::firstOrCreate(['name' => 'pembimbing-sekolah']);
        $siswa = Role::firstOrCreate(['name' => 'siswa']);

        $roles = collect([$adminPkl, $pembimbingPkl, $pembimbingSekolah, $siswa]);

        User::factory(50)->create()->each(function ($user) use ($roles) {
            $role = $roles->random();
            $user->assignRole($role);
        });
    }
}
