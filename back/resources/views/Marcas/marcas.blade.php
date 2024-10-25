@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Marcas</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3">Crear Nueva Marca</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>URL</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->name }}</td>
                    <td>{{ $marca->slug }}</td>
                    <td>
                        @if ($marca->url)
                            <a href="{{ $marca->url }}" target="_blank">{{ $marca->url }}</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($marca->image)
                            <img src="{{ asset('storage/' . $marca->image) }}" alt="{{ $marca->name }}" width="50">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('marcas.delete', $marca->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta marca?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay marcas disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
