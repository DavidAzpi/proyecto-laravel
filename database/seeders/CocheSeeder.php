<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CocheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos tablas para evitar duplicados (incluyendo la pivot)
        \Illuminate\Support\Facades\DB::table('coche_especificacion')->truncate();
        \App\Models\Coche::truncate();

        $lamborghini = \App\Models\Marca::where('nombre', 'Lamborghini')->first();
        $ferrari = \App\Models\Marca::where('nombre', 'Ferrari')->first();
        $porsche = \App\Models\Marca::where('nombre', 'Porsche')->first();
        $aston = \App\Models\Marca::where('nombre', 'Aston Martin')->first();
        $mclaren = \App\Models\Marca::where('nombre', 'McLaren')->first();

        $v12 = \App\Models\Especificacion::where('nombre', 'Motor V12')->first();
        $awd = \App\Models\Especificacion::where('nombre', 'Tracción Total (AWD)')->first();
        $cuero = \App\Models\Especificacion::where('nombre', 'Interior de Cuero')->first();
        $frenos = \App\Models\Especificacion::where('nombre', 'Frenos Cerámicos')->first();

        // --- Lamborghini ---
        $urus = \App\Models\Coche::create(['modelo' => 'Urus SE', 'precio' => 250000, 'imagen' => 'coches/urus_se.png', 'marca_id' => $lamborghini->id]);
        $urus->especificaciones()->attach([$awd->id, $cuero->id]);

        $revuelto = \App\Models\Coche::create(['modelo' => 'Revuelto', 'precio' => 500000, 'imagen' => 'coches/revuelto.png', 'marca_id' => $lamborghini->id]);
        $revuelto->especificaciones()->attach([$v12->id, $awd->id, $frenos->id]);

        $aventador = \App\Models\Coche::create(['modelo' => 'Aventador SVJ', 'precio' => 450000, 'imagen' => 'coches/lamborghini_aventador.png', 'marca_id' => $lamborghini->id]);
        $aventador->especificaciones()->attach([$v12->id, $frenos->id]);

        $huracan = \App\Models\Coche::create(['modelo' => 'Huracán STO', 'precio' => 320000, 'imagen' => 'coches/lamborghini_huracan.png', 'marca_id' => $lamborghini->id]);
        $huracan->especificaciones()->attach([$frenos->id]);

        $sterrato = \App\Models\Coche::create(['modelo' => 'Huracán Sterrato', 'precio' => 280000, 'imagen' => 'coches/sterrato.png', 'marca_id' => $lamborghini->id]);
        $sterrato->especificaciones()->attach([$awd->id]);

        $temerario = \App\Models\Coche::create(['modelo' => 'Temerario', 'precio' => 350000, 'imagen' => 'coches/temerario.png', 'marca_id' => $lamborghini->id]);

        // --- Ferrari ---
        $sf90 = \App\Models\Coche::create(['modelo' => 'SF90 Stradale', 'precio' => 430000, 'imagen' => 'coches/ferrari_sf90.png', 'marca_id' => $ferrari->id]);
        $sf90->especificaciones()->attach([$awd->id, $frenos->id]);

        $f812 = \App\Models\Coche::create(['modelo' => '812 Superfast', 'precio' => 340000, 'imagen' => 'coches/ferrari_812.png', 'marca_id' => $ferrari->id]);
        $f812->especificaciones()->attach([$v12->id, $cuero->id]);

        // --- Porsche ---
        $p911 = \App\Models\Coche::create(['modelo' => '911 Turbo S', 'precio' => 260000, 'imagen' => 'coches/porsche_911.png', 'marca_id' => $porsche->id]);
        $p911->especificaciones()->attach([$awd->id, $frenos->id]);

        $taycan = \App\Models\Coche::create(['modelo' => 'Taycan Turbo GT', 'precio' => 210000, 'imagen' => 'coches/porsche_taycan.png', 'marca_id' => $porsche->id]);
        $taycan->especificaciones()->attach([$awd->id]);

        // --- Aston Martin ---
        $dbs = \App\Models\Coche::create(['modelo' => 'DBS Volante', 'precio' => 310000, 'imagen' => 'coches/aston_martin_dbs.png', 'marca_id' => $aston->id]);
        $dbs->especificaciones()->attach([$v12->id, $cuero->id]);

        $vantage = \App\Models\Coche::create(['modelo' => 'Vantage', 'precio' => 180000, 'imagen' => 'coches/aston_martin_vantage.png', 'marca_id' => $aston->id]);

        // --- McLaren ---
        $m720s = \App\Models\Coche::create(['modelo' => '720S Spider', 'precio' => 290000, 'imagen' => 'coches/mclaren_720s.png', 'marca_id' => $mclaren->id]);
        $m720s->especificaciones()->attach([$frenos->id]);

        $artura = \App\Models\Coche::create(['modelo' => 'Artura', 'precio' => 230000, 'imagen' => 'coches/mclaren_artura.png', 'marca_id' => $mclaren->id]);
    }
}
