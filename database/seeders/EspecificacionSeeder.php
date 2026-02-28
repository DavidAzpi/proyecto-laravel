<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especificacion;

class EspecificacionSeeder extends Seeder
{
    public function run(): void
    {
        Especificacion::create([
            'nombre' => 'Motor', 
            'descripcion' => 'Arquitectura del bloque de cilindros, disposición (V, W, Boxer) y aspiración (Atmosférico/Turbo).'
        ]);
        Especificacion::create([
            'nombre' => 'Potencia', 
            'descripcion' => 'Rendimiento máximo del propulsor expresado en Caballos de Vapor (CV) a un régimen específico.'
        ]);
        Especificacion::create([
            'nombre' => 'Transmisión', 
            'descripcion' => 'Sistema de gestión de par motor, incluyendo tipo de embrague (Doble Embrague/Manual) y número de marchas.'
        ]);
    }
}
