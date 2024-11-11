<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategoria;

class SubCategoriaController extends Controller
{
    public function index(){
        $subcategoria = SubCategoria::all();

        return view("SubCategorias.index",compact("subcategoria"));
    }

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

        return redirect()->route('subcategory.index')->with('status', 'Subcategoría creada exitosamente.');
    }

    public function create() {
        return view('SubCategorias.create'); 
    }

    // Eliminar sub categoria
    public function delete($id){
        try {
            $sub_category = SubCategoria::findOrFail($id);
            $sub_category->delete();

            return redirect()->route('subcategory.index')->with('status', 'Subcategoría eliminada con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('subcategory.index')->with('status', 'Subcategoría no encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('subcategory.index')->with('status', 'Ocurrió un error al eliminar la subcategoría.');
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

        return redirect()->route('subcategory.index')->with('status', 'Subcategoría actualizada con éxito.');
    }

    public function edit($id)
{
    $subcategoria = Subcategoria::findOrFail($id); 
    return view('SubCategorias.edit', compact('subcategoria'));
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