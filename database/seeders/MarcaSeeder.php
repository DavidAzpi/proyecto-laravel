<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para las marcas de los coches.
 */
class MarcaSeeder extends Seeder
{
    public function run()
    {
        DB::table('marcas')->insert([
            ['nombre' => 'Ferrari', 'pais' => 'Italia', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Porsche', 'pais' => 'Alemania', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Lamborghini', 'pais' => 'Italia', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'McLaren', 'pais' => 'Reino Unido', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Aston Martin', 'pais' => 'Reino Unido', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
