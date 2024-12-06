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
        $permissions = [
            'view-all-batch', 'create-batch', 'edit-batch', 'delete-batch',
            'view-all-school', 'create-school', 'edit-school', 'delete-school',
            'view-all-major', 'create-major', 'edit-major', 'delete-major',
            'view-all-user', 'create-user', 'edit-user', 'delete-user',
            'view-all-student', 'create-student', 'edit-student', 'delete-student',
            'impersonate', 'view-crud',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'admin-super']);
        Role::create(['name' => 'admin-pkl']);
        Role::create(['name' => 'pembimbing-pkl']);
        Role::create(['name' => 'pembimbing-sekolah']);
        Role::create(['name' => 'siswa']);


        $adminPkl = Role::findByName('admin-pkl');
        $adminPkl->givePermissionTo('view-crud', 'view-all-batch', 'view-all-school', 'view-all-major', 'view-all-user', 'view-all-student');

        $pembimbingPkl = Role::findByName('pembimbing-pkl');
        $pembimbingPkl->givePermissionTo('view-crud', 'view-all-batch', 'view-all-school', 'view-all-major', 'view-all-user', 'view-all-student');
        
        $pembimbingSekolah = Role::findByName('pembimbing-sekolah');
        $pembimbingSekolah->givePermissionTo('view-crud', 'view-all-batch', 'view-all-school', 'view-all-major', 'view-all-user', 'view-all-student');

    }
}
