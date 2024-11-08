@extends('layouts.master')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="text-center p-5 rounded-3 shadow-lg" style="background-color: #f7f9fc; max-width: 600px;">
        <img src="https://i.postimg.cc/9QqqsCM3/file.png" alt="Logo" style="width: 200px; height: auto;">
        <h1 class="display-5 fw-bold" style="color: #9716e5;">Benvingut al CRUD de NetCore, {{ Auth::user()->name }}!</h1>
        <p class="lead mt-3" style="color: #555;">Ens alegra veure't aquí! Ara tens accés al panell d'administració per gestionar productes, categories i més.</p>
        <a href="{{ route('producte.index') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #16cfe5; border-color: #16cfe5;">
            Panell de Productes
        </a>
        <a href="{{ route('category.index') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #16cfe5; border-color: #16cfe5;">
            Panell de Categoria
        </a>
        <a href="{{ route('comanda.index') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #16cfe5; border-color: #16cfe5;">
            Panell de Comandes
        </a>
        <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #16cfe5; border-color: #16cfe5;">
            Panell d'Usuaris
        </a>
        <a href="{{ route('subcategory.index') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #16cfe5; border-color: #16cfe5;">
            Panell de Subcategoria
        </a>
        
    </div>
</div>
@endsection
