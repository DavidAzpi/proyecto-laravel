<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivamos claves foráneas para poder limpiar las tablas
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        $this->call([
            MarcaSeeder::class,
            EspecificacionSeeder::class,
            CocheSeeder::class,
            UserSeeder::class,
            PedidoSeeder::class,
        ]);

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
