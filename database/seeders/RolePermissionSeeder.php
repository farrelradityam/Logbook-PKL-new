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
        $permissions = ['view-all-batch', 'create-batch', 'edit-batch', 'delete-batch', 'view-all-school', 'create-school', 'edit-school', 'delete-school', 'view-all-major', 'create-major', 'edit-major', 'delete-major'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'admin-super']);
        Role::create(['name' => 'admin-pkl']);
        Role::create(['name' => 'pembimbing-pkl']);
        Role::create(['name' => 'pembimbing-sekolah']);
        Role::create(['name' => 'siswa']);


        $adminPkl = Role::findByName('admin-pkl');
        $adminPkl->givePermissionTo('view-all-batch', 'view-all-school', 'view-all-major');

    }
}
