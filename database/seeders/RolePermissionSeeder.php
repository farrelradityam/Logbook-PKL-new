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
        Permission::create(['name' => 'view all batch']);
        Permission::create(['name' => 'view batch by id']);
        Permission::create(['name' => 'edit batch']);
        Permission::create(['name' => 'update batch']);
        Permission::create(['name' => 'delete batch']);


        Role::create(['name' => 'admin-super']);
        Role::create(['name' => 'admin-pkl']);
        Role::create(['name' => 'pembimbing-pkl']);
        Role::create(['name' => 'pembimbing-sekolah']);
        Role::create(['name' => 'siswa']);


        $adminSuper = Role::findByName('admin-super');
        $adminSuper->givePermissionTo(['view all batch', 'view batch by id', 'edit batch', 'update batch', 'delete batch']);

        $adminPkl = Role::findByName('admin-pkl');
        $adminPkl->givePermissionTo('view all batch');

        $siswa = Role::findByName('siswa');
    }
}
