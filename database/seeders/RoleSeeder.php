<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::firstOrCreate(['name' => 'User']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        $userRole->givePermissionTo(['view-own-profile', 'edit-own-profile', 'change-own-password', 'add-to-cart', 'make-purchase']);
        $adminRole->givePermissionTo(['view-all-users', 'edit-user', 'delete-user', 'promote-to-admin', 'create-product']);
    }
}
