<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('frutas')->insert([
            [
                'nombre' => 'Naranja',
                'descripcion' => 'Fruta rica en vitamina C',
                'precio' => 1.20,
                'fecha' => now(),
                'categoria_id' => 1
            ],
            [
                'nombre' => 'Mango',
                'descripcion' => 'Fruta tropical dulce',
                'precio' => 2.50,
                'fecha' => now(),
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Fresa',
                'descripcion' => 'Fruta roja pequeña',
                'precio' => 3.00,
                'fecha' => now(),
                'categoria_id' => 3
            ]
        ]);
    }

}
