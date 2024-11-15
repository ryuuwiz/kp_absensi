<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'guru']);

        // Buat permission
        Permission::create(['name' => 'access admin panel']);
        Permission::create(['name' => 'access guru panel']);

        // Assign permission ke role
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(['access admin panel']);

        $guruRole = Role::findByName('guru');
        $guruRole->givePermissionTo(['access guru panel']);
    }
}
