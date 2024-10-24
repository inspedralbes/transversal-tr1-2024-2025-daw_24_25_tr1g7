<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    //
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'idBrand');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategoria::class, 'idSubCategory');
    }
}
