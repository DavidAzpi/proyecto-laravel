<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@phantom.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Usuario normal
        User::create([
            'name' => 'Usuario Cliente',
            'email' => 'user@phantom.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
