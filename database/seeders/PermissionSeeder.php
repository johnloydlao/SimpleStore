<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view-own-profile']);
        Permission::create(['name' => 'edit-own-profile']);
        Permission::create(['name' => 'change-own-password']);
        Permission::create(['name' => 'add-to-cart']);
        Permission::create(['name' => 'make-purchase']);

        Permission::create(['name' => 'view-all-users']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'promote-to-admin']);
        Permission::create(['name' => 'create-product']);
    }
}
