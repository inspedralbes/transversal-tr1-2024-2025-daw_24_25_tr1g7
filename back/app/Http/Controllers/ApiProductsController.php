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

    public function menuCategories()
    {
        $categories = Categoria::all();

        return $categories;
    }

    public function getProducts(){
        $products = Producte::with(['brand', 'sub_category.category',])
            ->get();
            return $products;
    }
//    public function checkLogin($id)
//    {
//        try {
//            $user = auth()->user();
//
//            if (!$user) {
//                return response()->json([
//                    'status' => false,
//                    'message' => 'No hay usuario autenticado'
//                ], 401);
//            }
//
//            $isMatchingUser = $user->id == $id;
//
//            return response()->json([
//                'status' => true,
//                'isMatch' => $isMatchingUser,
//                'userData' => $isMatchingUser ? $user : null
//            ]);
//
//        } catch (\Exception $e) {
//            return response()->json([
//                'status' => false,
//                'message' => 'Error al verificar el usuario',
//                'error' => $e->getMessage()
//            ], 500);
//        }
//    }

}
