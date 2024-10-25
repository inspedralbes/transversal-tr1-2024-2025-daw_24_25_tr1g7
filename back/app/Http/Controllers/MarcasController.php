<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    // Listar todas las marcas
    public function index(){
        $marcas = Marca::all();

        return view("Marcas.index", compact("marcas"));
    }

    // Crear una nueva marca
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:marcas,slug',
            'url' => 'nullable|url',
            'image' => 'nullable|image'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'Este slug ya está en uso',
            'url.url' => 'El campo URL debe ser una URL válida',
            'image.image' => 'El archivo debe ser una imagen válida'
        ]);

        $marca = new Marca();
        $marca->name = $data['name'];
        $marca->slug = $data['slug'];
        $marca->url = $data['url'] ?? null;
        if ($request->hasFile('image')) {
            $marca->image = $request->file('image')->store('marcas');
        }
        $marca->save();

        return redirect()->route('marcas.index')->with('status', 'Marca creada exitosamente.');
    }

    // Mostrar formulario para crear una nueva marca
    public function create() {
        return view('Marcas.create');
    }

    // Eliminar una marca
    public function delete($id){
        try {
            $marca = Marca::findOrFail($id);
            $marca->delete();

            return redirect()->route('marcas.index')->with('status', 'Marca eliminada con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('marcas.index')->with('status', 'Marca no encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('marcas.index')->with('status', 'Ocurrió un error al eliminar la marca.');
        }
    }

    // Actualizar una marca existente
    public function update($id, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:marcas,slug,' . $id,
            'url' => 'nullable|url',
            'image' => 'nullable|image'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'Este slug ya está en uso',
            'url.url' => 'El campo URL debe ser una URL válida',
            'image.image' => 'El archivo debe ser una imagen válida'
        ]);

        $marca = Marca::findOrFail($id);
        $marca->name = $data['name'];
        $marca->slug = $data['slug'];
        $marca->url = $data['url'] ?? null;
        if ($request->hasFile('image')) {
            $marca->image = $request->file('image')->store('marcas');
        }
        $marca->save();

        return redirect()->route('marcas.index')->with('status', 'Marca actualizada con éxito.');
    }

    // Mostrar formulario para editar una marca existente
    public function edit($id) {
        $marca = Marca::findOrFail($id);
        return view('Marcas.edit', compact('marca'));
    }

    // Listar todas las marcas en formato JSON
    public function list(){
        $marcas = Marca::all();

        return response()->json([
            'marcas' => $marcas,
            'status' => 'successful',
            'message' => 'Marcas listadas correctamente'
        ]);
    }
}
