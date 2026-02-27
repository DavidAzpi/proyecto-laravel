<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Marca
 * Representa el fabricante del vehículo.
 */
class Marca extends Model
{
    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['nombre', 'pais', 'logo'];

    /**
     * Relación 1:N con coches.
     * Una marca tiene muchos coches.
     */
    public function coches()
    {
        return $this->hasMany(Coche::class);
    }
}
