@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Marcas</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('brand.create') }}" class="btn btn-primary mb-3">Crear Nueva Marca</a>

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
            @forelse ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->slug }}</td>
                    <td>
                        @if ($brand->url)
                            <a href="{{ $brand->url }}" target="_blank">{{ $brand->url }}</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($brand->image)
                            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" width="50">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('brand.delete', $brand->id) }}" method="POST" style="display:inline-block;">
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
