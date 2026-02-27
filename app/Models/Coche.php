<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Coche
 * Representa un vehículo en el concesionario.
 */
class Coche extends Model
{
    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['modelo', 'precio', 'imagen', 'marca_id'];

    /**
     * Relación 1:N con la marca.
     * Un coche pertenece a una marca.
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    /**
     * Relación N:N con especificaciones.
     * Un coche puede tener muchas especificaciones y viceversa.
     */
    public function especificaciones()
    {
        return $this->belongsToMany(Especificacion::class, 'especificacion_coche')
            ->withPivot('valor');
    }
}
