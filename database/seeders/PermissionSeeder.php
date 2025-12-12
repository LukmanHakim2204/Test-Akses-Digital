<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Dashboard
            'view dashboard',

            // Management User
            'view user',
            'create user',
            'edit user',
            'delete user',

            // Management Customer
            'view customer',
            'create customer',
            'edit customer',
            'delete customer',

            // Project
            'view project',
            'create project',
            'edit project',
            'delete project',

            // Task
            'view task',
            'create task',
            'edit task',
            'delete task',

            // Orders
            'view orders',
            'create orders',
            'edit orders',
            'delete orders',

            // Finance
            'view finance',
            'create finance',
            'edit finance',
            'delete finance',

            // Role
            'view role',
            'create role',
            'edit role',
            'delete role',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
