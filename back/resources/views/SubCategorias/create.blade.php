@extends('layouts.master')

@section('page-style')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
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
    <h1>Crear Nueva Subcategoría</h1>

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

    <!-- Formulario para crear una nueva subcategoría -->
    <form action="{{ route('subcategory.store') }}" method="POST">
        @csrf

        <!-- Campo para el nombre de la subcategoría -->
        <div class="form-group">
            <label for="name">Nombre de la Subcategoría</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- Campo para el ID de la categoría -->
        <div class="form-group">
            <label for="idCategory">ID de la Categoría</label>
            <input type="number" id="idCategory" name="idCategory" class="form-control" value="{{ old('idCategory') }}" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-success">Crear Subcategoría</button>
        <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('page-script')
<script>
// Puedes agregar scripts aquí si los necesitas
</script>
@endsection
