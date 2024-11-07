<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function articulos()
    {
        return $this->hasMany(ArticuloComanda::class, 'id');
    }
}
