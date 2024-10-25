<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

class ProducteController extends Controller
{
    // Listar productos
    public function index(){
        $producte = Producte::all();
        return view("Products.index", compact("producte"));
    }

    public function crear()
    {
        return view('Products.crear');
    }

    // Añadir producto
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'idSubCategory'=> 'required|integer',
            'description'=> 'required|string',
            'stock'=> 'required|integer',
            'idBrand'=> 'required|integer',
            'image_path'=> 'required|url',
            'price'=> 'required|numeric',
            'color'=> 'required|string'
        ],
        [
            'name.required' => 'El campo nombre es requerido',
            'idSubCategory.required' => 'El campo subcategoría es requerido',
            'description.required' => 'El campo descripción es requerido',
            'stock.required' => 'El campo stock es requerido',
            'idBrand.required' => 'El campo marca es requerido',
            'image_path.required' => 'El campo imagen es requerido',
            'price.required' => 'El campo precio es requerido',
            'color.required' => 'El campo color es requerido'
        ]);

        // Crear nuevo producto
        $producte = new Producte();
        $producte->name = $data['name'];
        $producte->description = $data['description'];
        $producte->idSubCategory = $data['idSubCategory'];
        $producte->stock = $data['stock'];
        $producte->idBrand = $data['idBrand'];
        $producte->image_path = $data['image_path'];
        $producte->price = $data['price'];
        $producte->color = $data['color'];
        $producte->save();

        return redirect()->route('producte.index')->with('status', 'Producto creado con éxito');
    }

    // Eliminar producto
    public function delete($id){
        try {
            $producte = Producte::findOrFail($id);
            $producte->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'Producto eliminado'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar el producto'
            ], 500);
        }
    }

    // Modificar producto
    public function update($id, Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'idSubCategory'=> 'required|integer',
            'description'=> 'required|string',
            'stock'=> 'required|integer',
            'idBrand'=> 'required|integer',
            'image_path'=> 'required|url',
            'price'=> 'required|numeric',
            'color'=> 'required|string'
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
    
        return redirect()->route('producte.index')->with('status', 'Producto actualizado con éxito');
    }
    
    public function edit($id)
    {
        $producto = Producte::findOrFail($id); 
        return view('Products.edit', compact('producto')); 
    }

    // Listar productos (API)
    public function list(){
        $producte = Producte::all();
        return response()->json([
            'producte' => $producte,
            'status'=> 'successful',
            'message'=> 'Productos listados'
        ]);
    }
}
