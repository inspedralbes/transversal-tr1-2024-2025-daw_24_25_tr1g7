@extends('layouts.master')

@section('page-style')
<style>
body {
    background-color: #007bff;
}

.container {
    margin-top: 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #343a40;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th {
    background-color: #007bff;
    color: white;
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #0056b3;
}

td {
    padding: 10px;
    border-bottom: 1px solid #dee2e6;
}

tr:hover {
    background-color: #f1f1f1;
}

.btn {
    margin: 5px;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-success {
    background-color: #28a745;
    color: white;
    border: none;
}

.alert {
    margin-top: 10px;
    padding: 15px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}
</style>
@endsection

@section('content')
<div class="container">
    <h1>Listado de Subcategorías</h1>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>ID Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategoria as $sub)
            <tr>
                <td>{{ $sub->id }}</td>
                <td>{{ $sub->name }}</td>
                <td>{{ $sub->idCategory }}</td>
                <td>
                    <!-- Formulario para eliminar -->
                    <form action="{{ route('subcategory.delete', $sub->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Estás seguro de eliminar esta subcategoría?')">Eliminar</button>
                    </form>

                    <!-- Link para editar -->
                    <form action="{{ route('subcategory.update', $sub->id) }}" method="PUT" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('subcategory.edit', $sub->id) }}" class="btn btn-success">Editar</a>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Enlace para crear nueva subcategoría -->
    <a href="{{ route('subcategory.create') }}" class="btn btn-success">Crear nueva subcategoría</a>
</div>
@endsection

@section('page-script')

@endsection