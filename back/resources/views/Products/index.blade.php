@extends('layouts.master')

@section('page-style')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-edit {
            color:white;
            background-color:#e0a800;
        }
        .action-buttons {
            display: flex; 
            gap: 10px; 
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>

        <form method="GET" action="{{ route('producte.index') }}">
            <div class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="Nom del producte" value="{{ request()->input('query') }}">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>
        <a href="{{ route('producte.crear') }}" class="btn btn-success">Afegir Producte</a><br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producte as $producto)
                    <tr data-id="{{ $producto->id }}">
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->description }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->brand->name ?? 'Sin Marca' }}</td>
                        <td>{{ $producto->price }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('producte.edit', $producto->id) }}" class="btn btn-edit">Editar</a>
                                <button onclick="deleteProduct({{ $producto->id }})" class="btn btn-danger">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('page-script')
<script>
    function deleteProduct(id) {
        if (confirm('¿Estas segur de que vols eliminar aquest producte?')) {
            fetch(`/productedelete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'successful') {
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    row.remove();
                } else {
                    alert('Error al eliminar el producto: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Hubo un problema con la petición fetch:', error);
                alert('Ocurrió un error al intentar eliminar el producto.');
            });
        }
    }
</script>
@endsection
