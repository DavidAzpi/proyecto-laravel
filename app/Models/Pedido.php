<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Relación con el coche solicitado.
     */
    public function coche()
    {
        return $this->belongsTo(Coche::class);
    }
}
