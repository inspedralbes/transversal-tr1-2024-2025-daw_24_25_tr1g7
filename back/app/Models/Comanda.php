<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddresses::class, 'idShippingAddress');
    }

    public function billingAddress()
    {
        return $this->belongsTo(BillingAddress::class, 'idBillingAddress');
    }

    public function products()
    {
        return $this->hasMany(ArticuloComanda::class, 'idOrder');
    }
}
