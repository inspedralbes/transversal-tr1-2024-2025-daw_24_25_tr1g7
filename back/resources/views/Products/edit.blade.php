@extends('layouts.master')

@section('page-style')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
    }
    .btn {
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="container form-container">
    <h1>Editar Producto</h1>

    <form action="{{ route('producte.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Editar nom -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $producto->name) }}" required>
        </div>

        <!-- Editar subcategoria -->
        <div class="form-group">
            <label for="idSubCategory">ID Subcategoría</label>
            <input type="number" id="idSubCategory" name="idSubCategory" class="form-control" value="{{ old('idSubCategory', $producto->idSubCategory) }}" required>
        </div>

        <!-- Editar la descripció -->
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description', $producto->description) }}</textarea>
        </div>

        <!-- Editar el stock -->
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required>
        </div>

        <!-- Editar la marca -->
        <div class="form-group">
            <label for="idBrand">ID Marca</label>
            <input type="number" id="idBrand" name="idBrand" class="form-control" value="{{ old('idBrand', $producto->idBrand) }}" required>
        </div>

        <!-- Editar la imatge -->
        <div class="form-group">
            <label for="image_path">Imagen (URL)</label>
            <input type="text" id="image_path" name="image_path" class="form-control" value="{{ old('image_path', $producto->image_path) }}" required>
        </div>


        <!-- Editar el preu -->
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $producto->price) }}" required pattern="^\d+(\.\d{1,2})?$" title="Introduce un precio válido (por ejemplo: 10.99)">
        </div>


        <!-- Editar color -->
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $producto->color) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Producto</button>
    </form>
</div>
@endsection
