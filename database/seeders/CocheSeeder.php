<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para los coches iniciales.
 */
class CocheSeeder extends Seeder
{
    public function run()
    {
        DB::table('coches')->insert([
            ['modelo' => 'SF90 Stradale', 'precio' => 430000, 'marca_id' => 1, 'imagen' => 'images/showroom/ferrari_sf90.png', 'created_at' => now(), 'updated_at' => now()],
            ['modelo' => '911 Turbo S', 'precio' => 220000, 'marca_id' => 2, 'imagen' => 'images/showroom/porsche_911.png', 'created_at' => now(), 'updated_at' => now()],
            ['modelo' => 'Aventador SVJ', 'precio' => 517000, 'marca_id' => 3, 'imagen' => 'images/showroom/lamborghini_aventador.png', 'created_at' => now(), 'updated_at' => now()],
            ['modelo' => '720S', 'precio' => 284000, 'marca_id' => 4, 'imagen' => 'images/showroom/mclaren_720s.png', 'created_at' => now(), 'updated_at' => now()],
            ['modelo' => 'DBS Volante', 'precio' => 310000, 'marca_id' => 5, 'imagen' => 'images/showroom/aston_martin_dbs.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
