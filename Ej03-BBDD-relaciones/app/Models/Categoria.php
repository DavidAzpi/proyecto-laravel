<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    // 1:N
    public function frutas()
    {
        return $this->hasMany(Fruta::class);
    }

}
