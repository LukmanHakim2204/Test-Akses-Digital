<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'role' => 'Manager',
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'role' => 'Staff',
            ],
            [
                'name' => 'Finance User',
                'email' => 'finance@example.com',
                'role' => 'Finance',
            ]
        ];
        foreach ($users as $userData) {
            $user = \App\Models\User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->assignRole($userData['role']);
        }
    }
}
