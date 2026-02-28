<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phantom Cars - Gestión de Concesionario</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1>Phantom Cars</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('coches.index') }}">Coches</a></li>
                    <li><a href="{{ route('marcas.index') }}">Marcas</a></li>
                    <li><a href="{{ route('especificaciones.index') }}">Especificaciones</a></li>
                    @auth
                        <li class="user-info">
                            Hola, {{ Auth::user()->name }} ({{ Auth::user()->rol }})
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-logout">Salir</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Proyecto Laravel - Desarrollo de Aplicaciones Web</p>
        </div>
    </footer>
</body>
</html>
