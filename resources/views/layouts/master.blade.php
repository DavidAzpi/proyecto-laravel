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
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('coches.index') }}" class="nav-logo"
                style="display: flex; align-items: center; gap: 15px;">
                <span
                    style="font-family: 'Syne', sans-serif; font-weight: 400; letter-spacing: 6px; font-size: 1.1rem; color: #111;">PHANTOM
                    <span style="font-weight: 200; opacity: 0.5;">CARS</span></span>
            </a>
            <div class="nav-links" style="display: flex; align-items: center; gap: 30px;">
                <a href="{{ route('coches.index') }}">Modelos</a>
                <a href="{{ route('marcas.index') }}">Marcas</a>
                <a href="{{ route('especificaciones.index') }}">Especificaciones</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" style="color: var(--lamb-gold); font-weight: 600; border: 1px solid var(--lamb-gold); padding: 6px 14px; border-radius: 4px; font-size: 0.75rem; letter-spacing: 1px;">Admin</a>
                @endif
                
                @auth
                    <div style="display: flex; align-items: center; gap: 18px; margin-left: 18px; border-left: 1px solid #eee; padding-left: 18px;">
                        <div style="text-align: right;">
                            <div style="color: var(--lamb-gold); font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                                {{ auth()->user()->role }}
                            </div>
                            <div style="color: #333; font-size: 0.82rem; font-weight: 400;">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn-premium btn-fill" style="padding: 7px 14px; font-size: 0.68rem;">
                                Salir
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-premium btn-fill" style="padding: 8px 18px; font-size: 0.72rem;">Entrar</a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('hero')

    <main class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px; min-height: 60vh;">
        @if(session('success'))
            <div style="background: #f0faf4; color: #2e7d32; padding: 14px 18px; margin-top: 20px; border-radius: 6px; border-left: 4px solid #38a169; font-family: 'Outfit', sans-serif; font-size: 0.85rem; font-weight: 300;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #fff5f5; color: #c62828; padding: 14px 18px; margin-top: 20px; border-radius: 6px; border-left: 4px solid #e53e3e; font-family: 'Outfit', sans-serif; font-size: 0.85rem; font-weight: 300;">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="premium-footer">
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 40px;">
            <div class="footer-minimal"
                style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 32px; border-bottom: 1px solid #e8e8e8; margin-bottom: 32px;">
                <a href="{{ route('coches.index') }}" class="nav-logo"
                    style="display: flex; align-items: center; gap: 15px; text-decoration: none;">
                    <span
                        style="font-family: 'Syne', sans-serif; font-weight: 400; letter-spacing: 6px; font-size: 1.1rem; color: #555;">PHANTOM
                        <span style="font-weight: 200; opacity: 0.6;">CARS</span></span>
                </a>
                <div class="nav-links">
                    <a href="{{ route('coches.index') }}"
                        style="color: #999; text-decoration: none; margin-left: 28px; font-size: 0.75rem; font-weight: 400; text-transform: uppercase; letter-spacing: 1px;">Modelos</a>
                    <a href="{{ route('marcas.index') }}"
                        style="color: #999; text-decoration: none; margin-left: 28px; font-size: 0.75rem; font-weight: 400; text-transform: uppercase; letter-spacing: 1px;">Marcas</a>
                    <a href="{{ route('especificaciones.index') }}"
                        style="color: #999; text-decoration: none; margin-left: 28px; font-size: 0.75rem; font-weight: 400; text-transform: uppercase; letter-spacing: 1px;">Especificaciones</a>
                </div>
            </div>
            <div class="footer-bottom"
                style="text-align: center; color: #bbb; font-size: 0.68rem; letter-spacing: 1px;">
                &copy; {{ date('Y') }} PHANTOM CARS | THE ULTIMATE LUXURY EXPERIENCE | DESARROLLADO PARA 2º DAW
                <div style="margin-top: 12px; font-size: 0.6rem; opacity: 0.5;">
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
