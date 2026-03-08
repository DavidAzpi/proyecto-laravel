<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Especificacion::create([
            'nombre' => 'Motor V12',
            'descripcion' => 'Motor de alto rendimiento con 12 cilindros en V.'
        ]);

        \App\Models\Especificacion::create([
            'nombre' => 'Tracción Total (AWD)',
            'descripcion' => 'Sistema de tracción en las cuatro ruedas para mejor agarre.'
        ]);

        \App\Models\Especificacion::create([
            'nombre' => 'Interior de Cuero',
            'descripcion' => 'Asientos y acabados en cuero premium cosido a mano.'
        ]);

        \App\Models\Especificacion::create([
            'nombre' => 'Frenos Cerámicos',
            'descripcion' => 'Sistema de frenado de alto rendimiento resistente al calor.'
        ]);
    }
}
