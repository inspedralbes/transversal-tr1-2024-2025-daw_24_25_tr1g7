<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //comanda
    public function order()
    {
        return $this->belongsTo(Comanda::class, 'idOrder');
    }
}
