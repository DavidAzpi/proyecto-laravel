<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHANTOM CARS - @yield('title', 'Luxury')</title>

    <!-- Premium Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;600&family=Syne:wght@400;500;700&family=Barlow+Condensed:ital,wght@0,300;0,400;1,300;1,400&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/premium.css') }}">

    @stack('styles')
</head>

<body>

    <nav class="premium-nav">
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
            <a href="{{ route('coches.index') }}" class="nav-logo"
                style="display: flex; align-items: center; gap: 15px;">
                <span
                    style="font-family: 'Syne', sans-serif; font-weight: 400; letter-spacing: 6px; font-size: 1.2rem;">PHANTOM
                    <span style="font-weight: 200; opacity: 0.7;">CARS</span></span>
            </a>
            <div class="nav-links">
                <a href="{{ route('coches.index') }}">Modelos</a>
                <a href="{{ route('marcas.index') }}">Marcas</a>
                <a href="{{ route('especificaciones.index') }}">Especificaciones</a>
            </div>
        </div>
    </nav>

    @yield('hero')

    <main class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
        @if(session('success'))
            <div
                style="background: #e8f5e9; color: #2e7d32; padding: 20px; margin-top: 20px; border-radius: 4px; border-left: 5px solid #4caf50;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="premium-footer">
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
            <div class="footer-minimal"
                style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 40px; border-bottom: 1px solid #222; margin-bottom: 40px;">
                <a href="{{ route('coches.index') }}" class="nav-logo"
                    style="display: flex; align-items: center; gap: 15px; text-decoration: none;">
                    <span
                        style="font-family: 'Syne', sans-serif; font-weight: 400; letter-spacing: 6px; font-size: 1.2rem; color: white;">PHANTOM
                        <span style="font-weight: 200; opacity: 0.7;">CARS</span></span>
                </a>
                <div class="nav-links">
                    <a href="{{ route('coches.index') }}"
                        style="color: var(--lamb-grey-medium); text-decoration: none; margin-left: 30px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Modelos</a>
                    <a href="{{ route('marcas.index') }}"
                        style="color: var(--lamb-grey-medium); text-decoration: none; margin-left: 30px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Marcas</a>
                    <a href="{{ route('especificaciones.index') }}"
                        style="color: var(--lamb-grey-medium); text-decoration: none; margin-left: 30px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Especificaciones</a>
                </div>
            </div>
            <div class="footer-bottom"
                style="text-align: center; color: var(--lamb-grey-medium); font-size: 0.7rem; letter-spacing: 1px;">
                &copy; {{ date('Y') }} PHANTOM CARS | THE ULTIMATE LUXURY EXPERIENCE | DESARROLLADO PARA 2º DAW
                <div style="margin-top: 15px; font-size: 0.6rem; opacity: 0.5;">
                    CONSUMO Y EMISIONES COMBINADOS: 11.8 - 14.1 L/100KM; CO2: 268 - 325 G/KM (WLTP)
                </div>
            </div>
        </div>
    </footer>

    <!-- Intersection Observer Script for animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observerOptions = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('[data-animate]').forEach((el) => {
                observer.observe(el);
            });
        });
    </script>

    @stack('scripts')
</body>

</html>