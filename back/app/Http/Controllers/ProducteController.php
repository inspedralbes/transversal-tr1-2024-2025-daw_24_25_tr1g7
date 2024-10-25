<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

class ProducteController extends Controller
{
    public function index(){
        $producte = Producte::all();

        return view("Products.index",compact("producte"));
    }


     //Añadir producto
     public function store(Request $request){
        $data = $request-> validate([
            'name' => 'required',
            'idSubCategory'=> 'required',
            'description'=> 'required',
            'stock'=> 'required',
            'idBrand'=> 'required',
            'image_path'=> 'required',
            'price'=> 'required',
            'color'=> 'required'
        ],
        [
            'name.required' => 'The name filed is required',
            'idSubCategory.required' => 'The id filed is required',
            'description.required' => 'The id filed is required',
            'stock.required' => 'The id filed is required',
            'idBrand.required' => 'The id filed is required',
            'image_path.required' => 'The id filed is required',
            'price.required' => 'The id filed is required',
            'color.required' => 'The id filed is required'
        ]);

        $producte = new Producte ();
        $producte->name = $data['name'];
        $producte->description = $data['description'];
        $producte->idSubCategory = $data['idSubCategory'];
        $producte->stock = $data['stock'];
        $producte->idBrand = $data['idBrand'];
        $producte->image_path = $data['image_path'];
        $producte->price = $data['price'];
        $producte->color = $data['color'];
        $producte->save();

         return redirect()->route('producte.index')->with('status', 'Producte modificado con exito');
    }

    // Eliminar producto
    public function delete($id){
        try {
            $producte = Producte::findOrFail($id);
            $producte->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'Producto eliminada'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Categoría no encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar la categoría'
            ], 500);
        }
    }

    //Modificar categoria
    public function update($id, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'idSubCategory'=> 'required',
            'description'=> 'required',
            'stock'=> 'required',
            'idBrand'=> 'required',
            'image_path'=> 'required',
            'price'=> 'required|numeric', // Asegúrate de que sea numérico
            'color'=> 'required'
        ]);
    
        // Actualiza el producto
        $producte = Producte::findOrFail($id);
        $producte->name = $data['name'];
        $producte->description = $data['description'];
        $producte->idSubCategory = $data['idSubCategory'];
        $producte->stock = $data['stock'];
        $producte->idBrand = $data['idBrand'];
        $producte->image_path = $data['image_path'];
        $producte->price = $data['price'];
        $producte->color = $data['color'];
        $producte->save();
    
        // Redirige a la lista de productos con un mensaje de éxito
        return redirect()->route('producte.index')->with('status', 'Producto actualizado con éxito');
    }
    
    public function edit($id)
    {
        $producto = Producte::findOrFail($id); // Busca el producto por ID
        return view('Products.edit', compact('producto')); // Devuelve la vista de edición
    }


    //Listar Productes
    public function list(){

        $producte = Producte::all();

        return response()->json([
            'producte' => $producte,
            'status'=> 'successful',
            'message'=> 'Producte llistada'
        ]);
    }
}
