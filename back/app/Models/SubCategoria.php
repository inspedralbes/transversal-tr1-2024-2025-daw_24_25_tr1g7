<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Categoria::class, 'idCategory');
    }
}
