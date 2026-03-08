<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'user_id', 
        'coche_id', 
        'precio', 
        'nombre_cliente', 
        'email_cliente', 
        'metodo_pago'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coche()
    {
        return $this->belongsTo(Coche::class);
    }
}
