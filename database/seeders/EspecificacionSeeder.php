<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para las especificaciones técnicas.
 */
class EspecificacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('especificaciones')->insert([
            ['nombre' => 'Motor', 'descripcion' => 'Configuración del motor (V8, V12, etc.)', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Potencia', 'descripcion' => 'Caballos de fuerza (CV)', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tracción', 'descripcion' => 'Tipo de tracción (RWD, AWD)', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Transmisión', 'descripcion' => 'Tipo de caja de cambios', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
