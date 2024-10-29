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
    <h1>Lista de Comandas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comanda as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <form action="{{ route('comanda.update', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="in_progress" {{ $item->status === 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                                    <option value="complete" {{ $item->status === 'complete' ? 'selected' : '' }}>Completo</option>
                                    <option value="cancelled" {{ $item->status === 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                                <input type="hidden" name="idUser" value="{{ $item->idUser }}">
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
