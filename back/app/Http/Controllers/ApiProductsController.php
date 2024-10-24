<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categoria;
use App\Models\Producte;
use Illuminate\Http\Request;

class ApiProductsController extends Controller
{
    //

    public function getHome()
    {
        $productsBestOffers = Producte::with(['brand', 'sub_category.category',])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $categoryTrend = Categoria::inRandomOrder()
            ->limit(6)
            ->get();

        $productsBestSellers = Producte::with(['brand', 'sub_category.category',])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $brandRandom = Brand::inRandomOrder()
            ->limit(6)
            ->get();

        return response()->json([
            'productsBestOffers' => $productsBestOffers,
            'categoryTrend' => $categoryTrend,
            'productsBestSellers' => $productsBestSellers,
            'brandRandom' => $brandRandom
        ]);
    }

}
