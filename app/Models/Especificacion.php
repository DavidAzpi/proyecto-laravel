<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Especificación
 * Representa una característica técnica (Motor, Potencia, etc.).
 */
class Especificacion extends Model
{
    use SoftDeletes;
    // Nombre de la tabla explícito
    protected $table = 'especificaciones';

    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Relación N:N con coches.
     * Una especificación puede estar en muchos coches.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coches()
    {
        return $this->belongsToMany(Coche::class, 'especificacion_coche')
            ->withPivot('valor');
    }
}
