<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Coche
 * Representa un vehículo en el concesionario.
 */
class Coche extends Model
{
    use SoftDeletes;

    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['modelo', 'precio', 'imagen', 'marca_id'];

    /**
     * Relación 1:N con la marca.
     * Un coche pertenece a una marca.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    /**
     * Relación N:N con especificaciones.
     * Un coche puede tener muchas especificaciones y viceversa.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function especificaciones()
    {
        return $this->belongsToMany(Especificacion::class, 'especificacion_coche')
            ->withPivot('valor');
    }
}
