@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Marca</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $brand->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $brand->slug) }}" required>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" name="url" class="form-control" id="url" value="{{ old('url', $brand->url) }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" name="image" class="form-control" id="image">
            @if ($brand->image)
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" width="100" class="mt-2">
            @else
                Sin imagen
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Marca</button>
        <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
