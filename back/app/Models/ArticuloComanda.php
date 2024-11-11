<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticuloComanda extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producte::class, 'idProduct'); 
    }
}
