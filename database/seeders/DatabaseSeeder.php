<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 1. Especificaciones
        $specs = [
            ['nombre' => 'Fibra de carbono', 'descripcion' => 'Chasis y paneles de carrocería en fibra de carbono para reducir peso.'],
            ['nombre' => 'Tracción total', 'descripcion' => 'Sistema de tracción en las cuatro ruedas para mejor agarre.'],
            ['nombre' => 'Motor V12', 'descripcion' => 'Motor de 12 cilindros de alto rendimiento.'],
            ['nombre' => 'Turboalimentado', 'descripcion' => 'Motor con turbocompresor para mayor potencia.'],
            ['nombre' => 'Aerodinámica activa', 'descripcion' => 'Alerones y difusores que se ajustan automáticamente.'],
        ];

        foreach ($specs as $spec) {
            \App\Models\Especificacion::create($spec);
        }

        $allSpecs = \App\Models\Especificacion::all();

        // 2. Marcas
        $marcas = [
            ['nombre' => 'Ferrari', 'pais' => 'Italia', 'logo' => 'ferrari_logo.png'],
            ['nombre' => 'Porsche', 'pais' => 'Alemania', 'logo' => 'porsche_logo.png'],
            ['nombre' => 'Lamborghini', 'pais' => 'Italia', 'logo' => 'lamborghini_logo.png'],
            ['nombre' => 'McLaren', 'pais' => 'Reino Unido', 'logo' => 'mclaren_logo.png'],
            ['nombre' => 'Aston Martin', 'pais' => 'Reino Unido', 'logo' => 'aston_martin_logo.png'],
        ];

        foreach ($marcas as $marcaData) {
            $marca = \App\Models\Marca::create($marcaData);

            // 3. Coches for each Marca
            if ($marca->nombre == 'Ferrari') {
                $coches = [
                    ['modelo' => 'SF90 Stradale', 'precio' => 430000, 'imagen' => 'images/showroom/ferrari_sf90.png'],
                    ['modelo' => '812 Superfast', 'precio' => 339000, 'imagen' => 'images/showroom/ferrari_812.png'],
                ];
            } elseif ($marca->nombre == 'Porsche') {
                $coches = [
                    ['modelo' => '911 Turbo S', 'precio' => 220000, 'imagen' => 'images/showroom/porsche_911.png'],
                    ['modelo' => 'Taycan Turbo S', 'precio' => 185000, 'imagen' => 'images/showroom/porsche_taycan.png'],
                ];
            } elseif ($marca->nombre == 'Lamborghini') {
                $coches = [
                    ['modelo' => 'Aventador SVJ', 'precio' => 517000, 'imagen' => 'images/showroom/lamborghini_aventador.png'],
                    ['modelo' => 'Huracán Evo', 'precio' => 210000, 'imagen' => 'images/showroom/lamborghini_huracan.png'],
                ];
            } elseif ($marca->nombre == 'McLaren') {
                $coches = [
                    ['modelo' => '720S', 'precio' => 284000, 'imagen' => 'images/showroom/mclaren_720s.png'],
                    ['modelo' => 'Artura', 'precio' => 230000, 'imagen' => 'images/showroom/mclaren_artura.png'],
                ];
            } else { // Aston Martin
                $coches = [
                    ['modelo' => 'DBS Volante', 'precio' => 310000, 'imagen' => 'images/showroom/aston_martin_dbs.png'],
                    ['modelo' => 'Vantage', 'precio' => 160000, 'imagen' => 'images/showroom/aston_martin_vantage.png'],
                ];
            }

            foreach ($coches as $cocheData) {
                $coche = $marca->coches()->create($cocheData);

                // Attach random specs
                $coche->especificaciones()->attach(
                    $allSpecs->random(rand(2, 4))->pluck('id')->toArray(),
                    ['valor' => 'Equipado de serie']
                );
            }
        }
    }
}
