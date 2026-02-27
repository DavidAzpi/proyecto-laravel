<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Especificación
 * Representa una característica técnica (Motor, Potencia, etc.).
 */
class Especificacion extends Model
{
    // Nombre de la tabla explícito
    protected $table = 'especificaciones';

    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Relación N:N con coches.
     * Una especificación puede estar en muchos coches.
     */
    public function coches()
    {
        return $this->belongsToMany(Coche::class, 'especificacion_coche')
            ->withPivot('valor');
    }
}
