<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategoria;

class SubCategoriaController extends Controller
{
    //Añadir una sub categoria
    public function store(Request $request){
        $data = $request-> validate([
            'name' => 'required',
            'idCategory'=> 'required'
        ],
        [
            'name.required' => 'The name filed is required',
            'idCategory.required' => 'The id filed is required'
        ]);

        $sub_category = new SubCategoria ();
        $sub_category->name = $data['name'];
        $sub_category->idCategory = $data['idCategory'];

        $sub_category->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Sub categoria creada'
        ]);
    }

    // Eliminar sub categoria
    public function delete($id){
        try {
            $sub_category = SubCategoria::findOrFail($id);
            $sub_category->delete();

            return response()->json([
                'status' => 'successful',
                'message' => 'Sub categoría eliminada'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sub categoría no encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar la categoría'
            ], 500);
        }
    }

    //Modificar sub categoria
    public function update($id, Request $request){
        $data = $request-> validate([
            'name' => 'required',
            'idCategory'=> 'required'
        ],
        [
            'name.required' => 'The name filed is required',
            'idCategory.required' => 'The id filed is required'
        ]);

        $sub_category = SubCategoria::findOrFail($id);
        $sub_category->name = $data['name'];
        $sub_category->idCategory = $data['idCategory'];
        $sub_category->save();

        return response()->json([
            'status'=> 'successful',
            'message'=> 'Sub categoria modificada'
        ]);
    }

    //Listar sub categories
    public function list(){

        $sub_category = SubCategoria::all();

        return response()->json([
            'sub_categories' => $sub_category,
            'status'=> 'successful',
            'message'=> 'Sub categoria llistada'
        ]);
    }
}
