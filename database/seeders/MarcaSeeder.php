<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos para evitar duplicados si se corre varias veces
        \App\Models\Marca::truncate();

        \App\Models\Marca::create([
            'nombre' => 'Lamborghini',
            'logo' => 'marcas/lamborghini_logo.png',
            'pais' => 'Italia'
        ]);

        \App\Models\Marca::create([
            'nombre' => 'Ferrari',
            'logo' => 'marcas/ferrari_logo.png',
            'pais' => 'Italia'
        ]);

        \App\Models\Marca::create([
            'nombre' => 'Porsche',
            'logo' => 'marcas/porsche_logo.png',
            'pais' => 'Alemania'
        ]);

        \App\Models\Marca::create([
            'nombre' => 'Aston Martin',
            'logo' => 'marcas/aston_martin_logo.png',
            'pais' => 'Reino Unido'
        ]);

        \App\Models\Marca::create([
            'nombre' => 'McLaren',
            'logo' => 'marcas/mclaren_logo.png',
            'pais' => 'Reino Unido'
        ]);
    }
}
