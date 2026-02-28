<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder Principal
 * Ejecuta todos los seeders en el orden correcto para mantener la integridad referencial.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Sembrar la base de datos de la aplicación.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MarcaSeeder::class,
            EspecificacionSeeder::class,
            CocheSeeder::class,
        ]);
    }
}
