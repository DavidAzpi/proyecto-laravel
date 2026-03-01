<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos usuarios previos para evitar errores de duplicado si se ejecuta sin fresh
        User::whereIn('email', ['admin@phantom.com', 'cliente@phantom.com'])->delete();

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@phantom.com',
            'password' => Hash::make('admin123'),
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Cliente Test',
            'email' => 'cliente@phantom.com',
            'password' => Hash::make('cliente123'),
            'rol' => 'cliente',
        ]);
    }
}
