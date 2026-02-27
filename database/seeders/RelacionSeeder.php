<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para la tabla pivote de especificaciones.
 */
class RelacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('especificacion_coche')->insert([
            // Ferrari SF90
            ['coche_id' => 1, 'especificacion_id' => 1, 'valor' => 'V8 Híbrido'],
            ['coche_id' => 1, 'especificacion_id' => 2, 'valor' => '1000 CV'],
            // Porsche 911
            ['coche_id' => 2, 'especificacion_id' => 1, 'valor' => '6 cilindros Boxer'],
            ['coche_id' => 2, 'especificacion_id' => 2, 'valor' => '650 CV'],
            // Lamborghini Aventador
            ['coche_id' => 3, 'especificacion_id' => 1, 'valor' => 'V12 Atmosférico'],
            ['coche_id' => 3, 'especificacion_id' => 2, 'valor' => '770 CV'],
        ]);
    }
}
