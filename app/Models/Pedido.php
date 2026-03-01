<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Pedido
 * Representa una solicitud de compra de un vehiculo.
 */
class Pedido extends Model
{
    protected $fillable = [
        'coche_id',
        'nombre',
        'email',
        'metodo_pago',
        'referencia',
        'total'
    ];

    /**
     * Relacion con el coche solicitado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coche()
    {
        return $this->belongsTo(Coche::class);
    }
}
