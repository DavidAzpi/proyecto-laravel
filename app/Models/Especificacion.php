<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especificacion extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function coches()
    {
        return $this->belongsToMany(Coche::class, 'coche_especificacion')
                    ->withTimestamps();
    }
}
