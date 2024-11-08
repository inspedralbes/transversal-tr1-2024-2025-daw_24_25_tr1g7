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
    .filter-form {
        margin-bottom: 20px;
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .status-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }
    th {
        background-color: #007bff;
        color: white;
        text-align: left;
    }
    tr:hover {
        background-color: #f1f1f1;
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
    <h1>Lista de Comandas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario para filtrar por múltiples criterios -->
    <form action="{{ route('comanda.index') }}" method="GET" class="filter-form">
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="">Todos</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
            <option value="complete" {{ request('status') == 'complete' ? 'selected' : '' }}>Completo</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
        </select>
        <input type="text" name="id" placeholder="ID" value="{{ request('id') }}" class="form-control" />
        <input type="text" name="name" placeholder="Nombre de Usuario" value="{{ request('name') }}" class="form-control" />
        <input type="number" step="0.01" name="price" placeholder="Precio" value="{{ request('price') }}" class="form-control" />
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <!-- Tabla para todas las comandas filtradas -->
    <table class="status-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Precio</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comanda as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <!-- Verificar si el usuario tiene rol de admin para permitir edición -->
                        @if (auth()->user()->hasRole('admin'))
                            <form action="{{ route('comanda.update', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="in_progress" {{ $item->status == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                                    <option value="complete" {{ $item->status == 'complete' ? 'selected' : '' }}>Completo</option>
                                    <option value="cancelled" {{ $item->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </form>
                        @else
                            <p class="no-permission">No tienes permisos para editar esta comanda.</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
