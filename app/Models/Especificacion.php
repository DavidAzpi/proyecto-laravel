<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especificacion extends Model
{
    protected $table = 'especificaciones';
    protected $fillable = ['nombre', 'descripcion'];

    public function coches()
    {
        return $this->belongsToMany(Coche::class, 'especificacion_coche')->withPivot('valor');
    }
}
