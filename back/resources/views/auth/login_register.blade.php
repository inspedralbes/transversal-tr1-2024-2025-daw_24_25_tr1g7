@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Formulari Login -->
        <div class="col-md-5" id="loginForm">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center">Iniciar Sessió</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger w-100">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correu Electrònic</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(to right, #16cfe5, #9716e5)">Iniciar Sessió</button>
                    </form>

                    <div class="d-flex align-items-center justify-content-center pb-4 mt-3">
                        <p class="mb-0 me-2">No tens un compte?</p>
                        <button class="btn btn-outline-danger" onclick="toggleForms()">Crear nova</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulari Registre -->
        <div class="col-md-5 ms-4" id="registerForm" style="display: none;">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center">Registrar-se</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'Usuari</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-email" class="form-label">Correu Electrònic</label>
                            <input type="email" class="form-control" id="register-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="register-password" class="form-label">Contrasenya</label>
                            <input type="password" class="form-control" id="register-password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(to right, #16cfe5, #9716e5)">Registrar-se</button>
                    </form>

                    <div class="d-flex align-items-center justify-content-center pb-4 mt-3">
                        <p class="mb-0 me-2">Ja tens un compte?</p>
                        <button class="btn btn-outline-danger" onclick="toggleForms()">Iniciar Sessió</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForms() {
        var loginForm = document.getElementById('loginForm');
        var registerForm = document.getElementById('registerForm');

        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        } else {
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }
    }
</script>

@endsection