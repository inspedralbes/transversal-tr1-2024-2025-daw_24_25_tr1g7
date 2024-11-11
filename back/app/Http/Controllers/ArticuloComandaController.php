<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticuloComanda;

class ArticuloComandaController extends Controller
{
    //Añadir una comanda
    public function store(Request $request){
        $data = $request-> validate([
            'idOrder'=> 'required',
            'idProduct' => 'required',
            'num_product' => 'required'
        ],
        [
            'idOrder.required' => 'The id filed is required',
            'idProduct.required' => 'The name filed is required',
            'num_product.required' => 'The name filed is required'
        ]);

        $producte_comanda = new ArticuloComanda ();
        $producte_comanda->idOrder = $data['idOrder'];
        $producte_comanda->idProduct = $data['idProduct'];
        $producte_comanda->num_product = $data['num_product'];
        $producte_comanda->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'producte comanda creada'
        ]);
    }

    // Eliminar sub categoria
    public function delete($id){
        try {
            $producte_comanda = ArticuloComanda::findOrFail($id);
            $producte_comanda->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'producte comanda eliminada'
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

    //Modificar Articulo Comanda
    public function update($id, Request $request){
        $data = $request-> validate([
            'idOrder'=> 'required',
            'idProduct' => 'required',
            'num_product' => 'required'
        ],
        [
            'idOrder.required' => 'The id filed is required',
            'idProduct.required' => 'The name filed is required',
            'num_product.required' => 'The name filed is required'
        ]);

        $producte_comanda = ArticuloComanda::findOrFail($id);
        $producte_comanda->idOrder = $data['idOrder'];
        $producte_comanda->idProduct = $data['idProduct'];
        $producte_comanda->num_product = $data['num_product'];
        $producte_comanda->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Articulo comanda modificada'
        ]);
    }

    //Listar sub categories
    public function list(){

        $producte_comanda = ArticuloComanda::all();

        return response()->json([
            'producte_comanda' => $producte_comanda,
            'status'=> 'successful',
            'message'=> 'Comanda llistada'
        ]);
    }
}
