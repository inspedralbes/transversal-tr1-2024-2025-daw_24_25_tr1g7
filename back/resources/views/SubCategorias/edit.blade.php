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
    <h1>Editar Subcategoría</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para editar una subcategoría -->
    <form action="{{ route('subcategory.update', $subcategoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Campo para el nombre de la subcategoría -->
    <div class="form-group">
        <label for="name">Nombre de la Subcategoría</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $subcategoria->name) }}" required>
    </div>

    <!-- Campo para el ID de la categoría -->
    <div class="form-group">
        <label for="idCategory">ID de la Categoría</label>
        <input type="number" id="idCategory" name="idCategory" class="form-control" value="{{ old('idCategory', $subcategoria->idCategory) }}" required>
    </div>

    <!-- Botón para enviar el formulario -->
    <form action="{{ route('subcategory.update', $subcategoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-success">Guardar Cambios</button>
    <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

</form>

</div>
@endsection
