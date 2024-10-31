<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view all data']);
        Permission::create(['name' => 'view data by id']);
        Permission::create(['name' => 'edit data']);
        Permission::create(['name' => 'update data']);
        Permission::create(['name' => 'delete data']);


        Role::create(['name' => 'admin-super']);
        Role::create(['name' => 'admin-pkl']);
        Role::create(['name' => 'pembimbing-pkl']);
        Role::create(['name' => 'pembimbing-sekolah']);
        Role::create(['name' => 'siswa']);


        $adminSuper = Role::findByName('admin-super');
        $adminSuper->givePermissionTo(['view all data', 'view data by id', 'edit data', 'update data', 'delete data']);

        $adminPkl = Role::findByName('admin-pkl');
        $adminPkl->givePermissionTo('view all data');

        $siswa = Role::findByName('siswa');
    }
}
