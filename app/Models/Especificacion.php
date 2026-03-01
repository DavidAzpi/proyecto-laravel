<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Especificacion
 * Representa una caracteristica tecnica (Motor, Potencia, etc.).
 */
class Especificacion extends Model
{
    use SoftDeletes;
    // Nombre de la tabla explicito
    protected $table = 'especificaciones';

    // Campos que se pueden rellenar de forma masiva
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Relacion N:N con coches.
     * Una especificacion puede estar en muchos coches.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coches()
    {
        return $this->belongsToMany(Coche::class, 'especificacion_coche')
            ->withPivot('valor');
    }
}
