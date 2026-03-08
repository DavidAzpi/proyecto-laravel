<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre', 'logo', 'pais'];

    public function coches()
    {
        return $this->hasMany(Coche::class);
    }
}
