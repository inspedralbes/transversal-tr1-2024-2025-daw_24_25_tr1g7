<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Listar todas las marcas
    public function index(){
        $brands = Brand::all();

        return view("brand.index", compact("brands"));
    }

    // Crear una nueva marca
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'url' => 'nullable|url',
            'image' => 'nullable|image'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'Este slug ya está en uso',
            'url.url' => 'El campo URL debe ser una URL válida',
            'image.image' => 'El archivo debe ser una imagen válida'
        ]);

        $brand = new Brand();
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->url = $data['url'] ?? null;
        if ($request->hasFile('image')) {
            $brand->image = $request->file('image')->store('brand');
        }
        $brand->save();

        return redirect()->route('brand.index')->with('status', 'Marca creada exitosamente.');
    }

    // Mostrar formulario para crear una nueva marca
    public function create() {
        return view('brand.create');
    }

    // Eliminar una marca
    public function delete($id){
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();

            return redirect()->route('brand.index')->with('status', 'Marca eliminada con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('brand.index')->with('status', 'Marca no encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('brand.index')->with('status', 'Ocurrió un error al eliminar la marca.');
        }
    }

    // Actualizar una marca existente
    public function update($id, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $id,
            'url' => 'nullable|url',
            'image' => 'nullable|image'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'Este slug ya está en uso',
            'url.url' => 'El campo URL debe ser una URL válida',
            'image.image' => 'El archivo debe ser una imagen válida'
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->url = $data['url'] ?? null;
        if ($request->hasFile('image')) {
            if ($brand->image) {
                Storage::delete($brand->image);
            }
            $brand->image = $request->file('image')->store('brand');
        }
        $brand->save();

        return redirect()->route('brand.index')->with('status', 'Marca actualizada con éxito.');
    }

    // Mostrar formulario para editar una marca existente
    public function edit($id) {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    // Listar todas las marcas en formato JSON
    public function list(){
        $brands = Brand::all();

        return response()->json([
            'brands' => $brands,
            'status' => 'successful',
            'message' => 'Marcas listadas correctamente'
        ]);
    }
}
