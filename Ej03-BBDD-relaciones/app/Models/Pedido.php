<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'cliente',
        'fecha'
    ];

    public $timestamps = false;

    public function frutas()
    {
        return $this->belongsToMany(Fruta::class)
            ->withPivot('cantidad');
    }
}

