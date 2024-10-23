<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //Añadir una factura
    public function store(Request $request){
        $data = $request-> validate([
            'idOrder'=> 'required',
            'idUser' => 'required',
            'price' => 'required'
        ],
        [
            'idOrder.required' => 'The id filed is required',
            'idUser.required' => 'The name filed is required',
            'price.required' => 'The name filed is required'
        ]);

        $factura = new Invoice ();
        $factura->idOrder = $data['idOrder'];
        $factura->idUser = $data['idUser'];
        $factura->price = $data['price'];
        $factura->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'factura creada'
        ]);
    }

    // Eliminar factura
    public function delete($id){
        try {
            $factura = Invoice::findOrFail($id);
            $factura->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'factura eliminada'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'factura no encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar la factura'
            ], 500);
        }
    }

    //Modificar factures
    public function update($id, Request $request){
        $data = $request-> validate([
            'idOrder'=> 'required',
            'idUser' => 'required',
            'price' => 'required'
        ],
        [
            'idOrder.required' => 'The id filed is required',
            'idUser.required' => 'The name filed is required',
            'price.required' => 'The name filed is required'
        ]);

        $factura = Invoice::findOrFail($id);
        $factura->idOrder = $data['idOrder'];
        $factura->idUser = $data['idUser'];
        $factura->price = $data['price'];
        $factura->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Factura modificada'
        ]);
    }

    //Listar factures
    public function list(){

        $factura = Invoice::all();

        return response()->json([
            'factura' => $factura,
            'status'=> 'successful',
            'message'=> 'Factura llistada'
        ]);
    }
}
