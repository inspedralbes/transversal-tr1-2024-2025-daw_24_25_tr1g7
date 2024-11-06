<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Roboto:400,500,600|Open+Sans:400,500,600|Lato:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @yield('page-style')
    
    <style>
        .navbar {
            font-family: 'Roboto', 'Open Sans', 'Lato', sans-serif;
            position: sticky;
            z-index: 1000;
            top: 0;
        }

        .navbar .nav-link, .navbar .navbar-brand {
            color: white !important;
        }

        .navbar .nav-link:hover, .navbar .navbar-brand:hover {
            color: white;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    @if(Auth::check())
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #16cfe5, #9716e5);">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                    <img src="https://i.postimg.cc/9QqqsCM3/file.png" alt="Admin Panel Logo" style="width: 30px; height: 30px; margin-right: 10px;">
                    Admin Panel
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('producte.index') }}">Productes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subcategory.index') }}">Subcategories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Tancar Sessió</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

@yield('content')

@yield('page-script')

</body>
</html>
