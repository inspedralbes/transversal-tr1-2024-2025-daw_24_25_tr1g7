<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //comanda
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function order()
    {
        return $this->belongsTo(Comanda::class, 'idOrder');
    }
}
