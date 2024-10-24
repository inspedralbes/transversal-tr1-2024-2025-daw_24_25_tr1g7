<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $categories = Categoria::all();

        return view("Categories.categories",compact("categories"));
    }

    //Añadir categoria
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'El campo nombre es obligatorio',
        ]);
    
        try {
            $category = new Categoria();
            $category->name = $data['name'];
            $category->save();
    
            return redirect()->route('category.index')->with('status', 'Categoría creada con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == 23000){  
                return redirect()->route('category.index')->withErrors(['name' => 'El nombre de la categoría ya existe']);
            }
            return redirect()->route('category.index')->withErrors(['error' => 'Ocurrió un error inesperado al crear la categoría']);
        }
    }
    
    public function store_js(Request $request){
        $data = $request-> validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'The name filed is required'
        ]);

        $category = new Categoria ();
        $category->name = $data['name'];
        $category->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Categoria creada'
        ]);
    }

    // Eliminar categoria
    public function delete($id){
        try {
            $category = Categoria::findOrFail($id);
            $category->delete();

            return redirect()->route('category.index')->with('status', 'Categoría modificada con éxito');

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

    public function delete_js($id){
        try {
            $category = Categoria::findOrFail($id);
            $category->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'Categoría eliminada'
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
    public function update($id, Request $request){
        $data = $request-> validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'The name filed is required'
        ]);
    try{
        $category = Categoria::findOrFail($id);
        $category->name = $data['name'];
        $category->save();

        return redirect()->route('category.index')->with('status', 'Categoría modificada con éxito');
    } catch (\Illuminate\Database\QueryException $e) {
        if($e->getCode() == 23000){  
            return redirect()->route('category.index')->withErrors(['name' => 'El nombre de la categoría ya existe']);
        }
        return redirect()->route('category.index')->withErrors(['error' => 'Ocurrió un error inesperado al crear la categoría']);
    }
    }

    public function update_js($id, Request $request){
        $data = $request-> validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'The name filed is required'
        ]);

        $category = Categoria::findOrFail($id);
        $category->name = $data['name'];
        $category->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Categoria modificada'
        ]);
    }

    //Listar categorias
    public function list(){

        $category = Categoria::all();
    }

    public function list_js(){

        $category = Categoria::all();

        return response()->json([
            'categories' => $category,
            'status'=> 'successful',
            'message'=> 'Categoria llistada'
        ]);
    }
}
