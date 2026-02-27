<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruta extends Model
{
    protected $table = 'frutas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'fecha'
    ];

    public $timestamps = false; // porque tu tabla no usa created_at y updated_at

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // N:N
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)
            ->withPivot('cantidad');
    }

}
