@extends('layouts.master')

@section('content')
<div class="container border p-4 my-4">

    <!-- Formulario para añadir una nueva categoría -->
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label"><h1>Nueva Categoría</h1></label>
            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Nombre de la categoría" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Añadir Categoría</button>
    </form>

    <!-- Listar todas las categorías -->
    <div class="mt-4">
        <h3>Categorías</h3>
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{ route('category.update', $category->id) }}" class="d-flex align-items-center">
                        @csrf
                        @method('POST')
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control me-2">
                        <button type="submit" class="btn btn-warning btn-sm me-2">Editar</button>
                    </form>

                    <!-- Botón para eliminar -->
                    <form method="GET" action="{{ route('category.delete', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
