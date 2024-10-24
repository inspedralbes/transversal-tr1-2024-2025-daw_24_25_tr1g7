<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;

class ComandaController extends Controller
{
     //Añadir una comanda
     public function store(Request $request){
        $data = $request-> validate([
            'idUser'=> 'required',
            'status' => 'required',
            'price' => 'required'
        ],
        [
            'idUser.required' => 'The id filed is required',
            'status.required' => 'The status filed is required',
            'price.required' => 'The price filed is required'
        ]);

        $comanda = new Comanda ();
        $comanda->idUser = $data['idUser'];
        $comanda->status = $data['status'];
        $comanda->price = $data['price'];
        $comanda->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'comanda creada'
        ]);
    }

    // Eliminar sub categoria
    public function delete($id){
        try {
            $comanda = Comanda::findOrFail($id);
            $comanda->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'Comanda eliminada'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comanda no encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar la comanda'
            ], 500);
        }
    }

    //Modificar sub categoria
    public function update($id, Request $request){
        $data = $request-> validate([
            'idUser'=> 'required',
            'status' => 'required',
            'price' => 'required'
        ],
        [
            'idUser.required' => 'The id filed is required',
            'status.required' => 'The name filed is required',
            'price.required' => 'The name filed is required'
        ]);

        $comanda = Comanda::findOrFail($id);
        $comanda->idUser = $data['idUser'];
        $comanda->status = $data['status'];
        $comanda->price = $data['price'];
        $comanda->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Comanda modificada'
        ]);
    }

    //Listar sub categories
    public function list(){

        $comanda = Comanda::all();

        return response()->json([
            'comanda' => $comanda,
            'status'=> 'successful',
            'message'=> 'Comanda llistada'
        ]);
    }
}
