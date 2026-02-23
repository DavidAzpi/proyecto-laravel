<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    protected $fillable = ['modelo', 'precio', 'imagen', 'marca_id'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function especificaciones()
    {
        return $this->belongsToMany(Especificacion::class, 'especificacion_coche')->withPivot('valor');
    }
}
