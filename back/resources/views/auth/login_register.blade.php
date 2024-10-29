@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Formulario de Login -->
        <div class="col-md-5" id="loginForm">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>

            <div class="d-flex align-items-center justify-content-center pb-4 mt-3">
                <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                <button class="btn btn-outline-danger" onclick="toggleForms()">Crear nueva</button>
            </div>
        </div>

        <!-- Formulario de Registro -->
        <div class="col-md-5 ms-4" id="registerForm" style="display: none;">
            <h2>Registrarse</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="register-email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="register-email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="register-password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success">Registrarse</button>
            </form>

            <div class="d-flex align-items-center justify-content-center pb-4 mt-3">
                <p class="mb-0 me-2">¿Ya tienes una cuenta?</p>
                <button class="btn btn-outline-danger" onclick="toggleForms()">Iniciar Sesión</button>
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
