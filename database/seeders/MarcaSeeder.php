<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        Marca::create([
            'nombre' => 'Lamborghini', 
            'pais' => 'Italia', 
            'slogan' => 'Expect the unexpected', 
            'descripcion' => 'Automobili Lamborghini es un fabricante italiano de automóviles deportivos de lujo, fundado en 1963 por Ferruccio Lamborghini.'
        ]);
        Marca::create([
            'nombre' => 'Ferrari', 
            'pais' => 'Italia', 
            'slogan' => 'Driving emotion', 
            'descripcion' => 'Ferrari es un fabricante italiano de automóviles deportivos de alto rendimiento fundado por Enzo Ferrari en 1939.'
        ]);
        Marca::create([
            'nombre' => 'Aston Martin', 
            'pais' => 'Reino Unido', 
            'slogan' => 'Power, Beauty and Soul', 
            'descripcion' => 'Aston Martin es un fabricante británico de automóviles de lujo y alto rendimiento, conocido por su asociación con James Bond.'
        ]);
        Marca::create([
            'nombre' => 'Porsche', 
            'pais' => 'Alemania', 
            'slogan' => 'There is no substitute', 
            'descripcion' => 'Porsche es un fabricante alemán de automóviles deportivos de alta gama, fundado en Stuttgart en 1931 por Ferdinand Porsche.'
        ]);
        Marca::create([
            'nombre' => 'McLaren', 
            'pais' => 'Reino Unido', 
            'slogan' => 'Prepare to proceed', 
            'descripcion' => 'McLaren Automotive es un fabricante británico de automóviles deportivos de lujo con sede en Woking, Inglaterra.'
        ]);
    }
}
