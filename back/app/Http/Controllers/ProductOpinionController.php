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
        $opinion->image_path = $data['img'];
        $opinion->save();

        return response()->json([
            'opinion' => $opinion,
            'status'=> 'successful',
            'message'=> 'Opinion añadida'
        ]);
    }

    public function getProductOpinions($productId){

        $opinions = ProductOpinion::where('idProductes', $productId)->get();
        return response()->json([
            'opinions' => $opinions,
            'status'=> 'successful',
            'message'=> 'Opiniones listados'
        ]);
    }

}
