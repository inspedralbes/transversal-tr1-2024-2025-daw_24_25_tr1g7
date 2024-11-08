<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductOpinion;
use Illuminate\Support\Facades\Auth;

class ProductOpinionController extends Controller
{
    public function index(){
        $opinion = ProductOpinion::all();

        return view("ProductOpinion.opinion",compact("opinion"));
    }

    // Añadir opinion
    public function store(Request $request){
        // return $request;
        $data = $request->validate([
            'idProductes'=> 'required|integer',
            'opinion_number'=> 'required',
            'opinion'=> 'required|string',
            'img'=> 'required',
        ],
        [
            'idProductes.required' => 'El campo id de producto es requerido',
            'opinion_number.required' => 'El campo puntuacion es requerido',
            'opinion.required' => 'El campo opinion es requerido',
            'img.required' => 'El campo imagen es requerido',
        ]);

        // Crear una nueva opinion
        $opinion = new ProductOpinion();
        $opinion->idUser = Auth::user()->id;
        $opinion->idProductes = $data['idProductes'];
        $opinion->opinion_number = $data['opinion_number'];
        $opinion->opinion = $data['opinion'];
        $opinion->img = $data['img'];
        $opinion->save();

        $opinionResult = ProductOpinion::with('user')->findOrFail($opinion->id);

        return response()->json([
            'opinion' => $opinionResult,
            'status'=> 'successful',
            'message'=> 'Opinion añadida'
        ]);
    }

    public function getProductOpinions($productId){

        $opinions = ProductOpinion::where('idProductes', $productId)
        ->with(['user'])
        ->get();
        return response()->json([
            'opinions' => $opinions,
            'status'=> 'successful',
            'message'=> 'Opiniones listados'
        ]);
    }

    public function getProductOpinionsStats($productId){

        $opinions = ProductOpinion::where('idProductes', $productId)
        ->with(['user'])
        ->get();
    
        $totalOpinions = $opinions->count();
        if ($totalOpinions === 0) {
            return response()->json([
                'average_rating' => 0,
                'recommend_percentage' => 0,
                'star_counts' => [
                    '5' => 0,
                    '4' => 0,
                    '3' => 0,
                    '2' => 0,
                    '1' => 0,
                ],
                'totalOpinions' => 0,
            ]);
        }

        // Calcular promedio de puntuación
        $averageRating = round($opinions->avg('opinion_number'), 1);

        // Calcular porcentaje de recomendaciones (opiniones con 4 o 5 estrellas)
        $recommendedCount = $opinions->where('opinion_number', '>=', 4)->count();
        $recommendPercentage = round(($recommendedCount / $totalOpinions) * 100);

        // Contar las opiniones por cada nivel de estrella
        $starCounts = [
            '5' => $opinions->where('opinion_number', 5)->count(),
            '4' => $opinions->where('opinion_number', 4)->count(),
            '3' => $opinions->where('opinion_number', 3)->count(),
            '2' => $opinions->where('opinion_number', 2)->count(),
            '1' => $opinions->where('opinion_number', 1)->count(),
        ];

        return response()->json([
            'average_rating' => $averageRating,
            'recommend_percentage' => $recommendPercentage,
            'star_counts' => $starCounts,
            'totalOpinions' => $totalOpinions,
        ]);
    }

}
