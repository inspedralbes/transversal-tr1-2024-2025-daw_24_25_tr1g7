@extends('layouts.master')

@section('page-style')
<style>
    .no-permission {
        color: red;
        font-style: italic;
    }
</style>
@endsection

@section('content')
<div class="container border p-4 my-4">

    <!-- Formulario para añadir una nueva categoría -->
    @if (auth()->user()->hasRole('admin')) 
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
    @else
        <p class="no-permission">No tienes permisos para añadir nuevas categorías.</p>
    @endif

    <!-- Listar todas las categorías -->
    <div class="mt-4">
        <h3>Categorías</h3>
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $category->name }}</span>

                    @if (auth()->user()->hasRole('admin'))
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                            Editar
                        </button>
                    @else
                        <p class="no-permission">No tienes permisos para editar esta categoría.</p>
                    @endif

                    @if (auth()->user()->hasRole('admin'))
                    <form method="POST" action="{{ route('category.delete', $category->id) }}" class="d-inline-block ms-2">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    @else
                        <p class="no-permission">No tienes permisos para eliminar esta categoría.</p>
                    @endif
                </li>

                <!-- Modal para editar categoría -->
                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Editar Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('category.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Nombre de la categoría</label>
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="categoryName{{ $category->id }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

</div>
@endsection
