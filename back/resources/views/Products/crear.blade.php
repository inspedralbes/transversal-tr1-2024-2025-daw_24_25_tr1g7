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
        <h1>Crear Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('producte.store') }}" method="POST">
            @csrf
            <!-- Campo para el nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <!-- Campo para la subcategoría -->
            <div class="form-group">
                <label for="idSubCategory">ID Subcategoría</label>
                <input type="number" id="idSubCategory" name="idSubCategory" class="form-control" required>
            </div>

            <!-- Campo para la descripción -->
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <!-- Campo para el stock -->
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>

            <!-- Campo para la marca -->
            <div class="form-group">
                <label for="idBrand">ID Marca</label>
                <input type="number" id="idBrand" name="idBrand" class="form-control" required>
            </div>

            <!-- Campo para la imagen -->
            <div class="form-group">
                <label for="image_path">Imagen (URL)</label>
                <input type="text" id="image_path" name="image_path" class="form-control" required>
            </div>

            <!-- Campo para el precio -->
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" id="price" name="price" class="form-control" required step="0.01">
            </div>

            <!-- Campo para el color -->
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Crear Producto</button>
        </form>
    </div>
@endsection
