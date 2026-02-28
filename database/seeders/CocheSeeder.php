<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coche;
use App\Models\Marca;

class CocheSeeder extends Seeder
{
    public function run(): void
    {
        $lambo = Marca::where('nombre', 'Lamborghini')->first();
        $ferrari = Marca::where('nombre', 'Ferrari')->first();
        $aston = Marca::where('nombre', 'Aston Martin')->first();
        $porsche = Marca::where('nombre', 'Porsche')->first();
        $mclaren = Marca::where('nombre', 'McLaren')->first();

        // Coches con imágenes en public/images/showroom
        Coche::create(['modelo' => 'Aventador SVJ', 'precio' => 450000, 'marca_id' => $lambo->id, 'imagen' => 'images/showroom/lamborghini_aventador.png']);
        Coche::create(['modelo' => '812 Superfast', 'precio' => 380000, 'marca_id' => $ferrari->id, 'imagen' => 'images/showroom/ferrari_812.png']);
        Coche::create(['modelo' => 'DBS Superleggera', 'precio' => 320000, 'marca_id' => $aston->id, 'imagen' => 'images/showroom/aston_martin_dbs.png']);
        Coche::create(['modelo' => '911 GT3 RS', 'precio' => 285000, 'marca_id' => $porsche->id, 'imagen' => 'images/showroom/porsche_911.png']);
        Coche::create(['modelo' => '720S Spider', 'precio' => 315000, 'marca_id' => $mclaren->id, 'imagen' => 'images/showroom/mclaren_720s.png']);
        
        // Coches para el Carousel (pueden ser los mismos o adicionales)
        Coche::create(['modelo' => 'Revuelto', 'precio' => 500000, 'marca_id' => $lambo->id, 'imagen' => 'images/carousel/revuelto.png']);
        Coche::create(['modelo' => 'Urus SE', 'precio' => 260000, 'marca_id' => $lambo->id, 'imagen' => 'images/carousel/urus_se.png']);
        Coche::create(['modelo' => 'Temerario', 'precio' => 400000, 'marca_id' => $lambo->id, 'imagen' => 'images/carousel/temerario.png']);
    }
}
