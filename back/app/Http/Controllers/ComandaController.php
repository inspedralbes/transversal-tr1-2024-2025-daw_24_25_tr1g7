<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use Illuminate\Support\Facades\Auth;

class ComandaController extends Controller
{

    public function index(Request $request)
{
    $status = $request->input('status');
    $id = $request->input('id');
    $name = $request->input('name');
    $price = $request->input('price');

    $comanda = Comanda::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->when($id, function ($query, $id) {
            return $query->where('id', $id);
        })
        ->when($name, function ($query, $name) {
            return $query->whereHas('user', function ($q) use ($name) {
                $q->where('name', 'like', '%' . $name . '%');
            });
        })
        ->when($price, function ($query, $price) {
            return $query->where('price', $price);
        })
        ->get();

    return view('Comandes.comandes', compact('comanda'));
}

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
            'status' => 'required|string|in:pending,in_progress,complete,cancelled'
        ],
        [
            'status.required' => 'The name filed is required'
        ]);

        $comanda = Comanda::findOrFail($id);
        $comanda->status = $data['status'];
        $comanda->save();

        return redirect()->route('comanda.index')->with('success', 'Estado de la comanda actualizado correctamente.');
    }

    public function edit($id){

    $comanda = Comanda::findOrFail($id);
    return view('Comandes.edit', compact('comanda'));

    }

    //Modificar sub categoria
    public function update_js($id, Request $request){
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

    public function getMyOrders()
    {
        $orders = Comanda::where('idUser', Auth::user()->id)
            ->with(['products', 'shippingAddress', 'billingAddress'])
            ->get();

        return response()->json($orders);
    }
}
