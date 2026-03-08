@extends('layouts.master')

@section('title', 'Showroom')

@section('hero')
    <div class="carousel-section" id="luxury-carousel">
        <div class="carousel-container">
            <!-- Peek Images -->
            <div class="peek-container peek-left">
                <img src="" id="peek-left-img" class="peek-img" alt="Peek Left">
            </div>
            <div class="peek-container peek-right">
                <img src="" id="peek-right-img" class="peek-img" alt="Peek Right">
            </div>

            <!-- Navegacion -->
            <button class="nav-arrow arrow-left" onclick="moveSlide(-1)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="nav-arrow arrow-right" onclick="moveSlide(1)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            <div class="carousel-track" id="track">
                <!-- Slide 1: Temerario -->
                <div class="carousel-slide active">
                    <div class="slide-content">
                        <div class="model-name">TEMERARIO</div>
                        <div class="italy-stripe">
                            <div class="stripe-green"></div>
                            <div class="stripe-white"></div>
                            <div class="stripe-red"></div>
                        </div>
                        <div class="tagline">YOU CAN'T HIDE WHO YOU ARE</div>
                        <div class="car-image-container">
                            <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/0_facelift_2025/homepage/models/temerario/familyChooser-Temerario_0.png"
                                class="car-image" alt="Temerario">
                        </div>

                    </div>
                </div>

                <!-- Slide 2: Urus SE -->
                <div class="carousel-slide">
                    <div class="slide-content">
                        <div class="model-name">URUS SE</div>
                        <div class="italy-stripe">
                            <div class="stripe-green"></div>
                            <div class="stripe-white"></div>
                            <div class="stripe-red"></div>
                        </div>
                        <div class="tagline tagline-high">DARE TO LIVE MORE</div>
                        <div class="car-image-container">
                            <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/0_facelift_2025/homepage/models/urus/models_urus_se.png"
                                class="car-image" alt="Urus SE">
                        </div>

                    </div>
                </div>

                <!-- Slide 3: Revuelto -->
                <div class="carousel-slide">
                    <div class="slide-content">
                        <div class="model-name">REVUELTO</div>
                        <div class="italy-stripe">
                            <div class="stripe-green"></div>
                            <div class="stripe-white"></div>
                            <div class="stripe-red"></div>
                        </div>
                        <div class="tagline">FROM NOW ON</div>
                        <div class="car-image-container">
                            <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/0_facelift_2025/homepage/models/revuelto/familyChooser-Revuelto_0.png"
                                class="car-image" alt="Revuelto">
                        </div>

                    </div>
                </div>

                <!-- Slide 4: Huracan Sterrato -->
                <div class="carousel-slide">
                    <div class="slide-content">
                        <div class="model-name">HURACÁN STERRATO</div>
                        <div class="italy-stripe">
                            <div class="stripe-green"></div>
                            <div class="stripe-white"></div>
                            <div class="stripe-red"></div>
                        </div>
                        <div class="tagline">BEYOND THE CONCRETE</div>
                        <div class="car-image-container">
                            <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/0_facelift_2025/homepage/models/huracan/familyChooser-Huracan%20Sterrato.png"
                                class="car-image" alt="Huracán Sterrato">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pagination-dots">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
            <div class="dot" onclick="goToSlide(3)"></div>
        </div>
    </div>
@endsection

@section('content')
    <div class="showroom-header" id="showroom" style="margin-top: 80px; text-align: center;" data-animate>
        <h2 style="font-size: 3rem; margin-bottom: 15px;">Modelos en Stock</h2>
        <p style="color: var(--lamb-grey-medium); max-width: 600px; margin: 0 auto 50px;">Explore nuestra selección
            exclusiva de vehículos de alto rendimiento. Cada unidad ha sido certificada por nuestros técnicos expertos.</p>
    </div>

    <!-- Filtros de Busqueda -->
    <div style="margin-bottom: 40px; display: flex; justify-content: center;" data-animate>
        <form action="/" method="GET"
            style="display: flex; gap: 10px; max-width: 500px; width: 100%;">
            <input type="text" name="buscar" placeholder="Buscar por modelo..." value="{{ request('buscar') }}"
                style="flex: 1; padding: 11px 18px; border: 1px solid #e0e0e0; background: #fff; color: #111; font-family: 'Outfit', sans-serif; border-radius: 6px; font-weight: 300;">
            <button type="submit" class="btn-premium btn-fill" style="padding: 12px 25px;">Buscar</button>
        </form>
    </div>

    @if(Auth::user()?->isAdmin())
    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px; gap: 12px;">
        <a href="{{ route('admin.dashboard') }}" style="color: #888; text-decoration: none; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; border: 1px solid #ddd; padding: 8px 18px; border-radius: 4px;">Panel Admin</a>
        <a href="{{ route('admin.coches.create') }}" class="btn-premium btn-fill">Añadir Vehículo</a>
    </div>
    @endif

    @if(session('success'))
        <div style="background: rgba(198, 168, 105, 0.1); color: var(--lamb-gold); padding: 15px; margin-bottom: 30px; border: 1px solid var(--lamb-gold); font-size: 0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="showroom-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 40px;">
        @forelse($coches as $coche)
            <div class="car-card" style="background: #ffffff; border: 1px solid #eee; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);" data-animate>
                <div style="aspect-ratio: 16/9; overflow: hidden; background: #f8f8f8; display: flex; align-items: center; justify-content: center; position: relative;">
                    @if($coche->imagen)
                        <img src="{{ asset('storage/' . $coche->imagen) }}" 
                             alt="{{ $coche->modelo }}" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;" class="car-thumb">
                    @else
                        <img src="https://placehold.co/600x400/f0f0f0/999?text={{ $coche->modelo }}" 
                             alt="{{ $coche->modelo }}" 
                             style="width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
                    @endif

                </div>
                <div style="padding: 30px;">
                    <h3 style="font-family: 'Syne', sans-serif; font-size: 1.15rem; margin-bottom: 6px; color: #111; text-transform: uppercase; font-weight: 500; letter-spacing: 1px;">
                        {{ $coche->modelo }}
                    </h3>
                    <div style="font-size: 1.4rem; font-weight: 400; color: #222; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">
                        {{ number_format($coche->precio, 0, ',', '.') }}<span style="font-size: 0.85rem; margin-left: 2px; color: #666;">€</span>
                    </div>
                    
                    <div style="display: flex; gap: 10px; align-items: center; border-top: 1px solid #f0f0f0; padding-top: 18px;">
                        <a href="{{ route('coches.show', $coche->id) }}" class="btn-premium btn-fill" style="text-decoration: none; flex: 1; text-align: center; font-size: 0.72rem; padding: 10px 16px;">
                            Explorar
                        </a>
                        @if(Auth::user()?->isAdmin())
                        <div style="display: flex; gap: 15px; margin-left: 10px;">
                            <a href="{{ route('admin.coches.edit', $coche->id) }}" style="color: #666; text-decoration: none; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; transition: 0.3s;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#666'">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            <form action="{{ route('admin.coches.delete', $coche->id) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ff4444; cursor: pointer; transition: 0.3s; padding: 0;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 80px 0; color: var(--lamb-grey-medium);">
                <p style="font-size: 1rem;">No hay vehículos disponibles en este momento.</p>
            </div>
        @endforelse
    </div>

    <div class="pagination-container" data-animate>
        {{ $coches->links() }}
    </div>

    @push('scripts')
        <script>
            let currentSlide = 0;
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.dot');
            let autoPlayInterval;

            function updateCarousel() {
                slides.forEach((slide, index) => {
                    if (index === currentSlide) {
                        slide.classList.remove('active');
                        void slide.offsetWidth;
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });

                updatePeeks();
            }

            function updatePeeks() {
                const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
                const nextIndex = (currentSlide + 1) % slides.length;

                const prevSrc = slides[prevIndex].querySelector('.car-image').src;
                const nextSrc = slides[nextIndex].querySelector('.car-image').src;

                const peekLeft = document.getElementById('peek-left-img');
                const peekRight = document.getElementById('peek-right-img');

                if (peekLeft) peekLeft.src = prevSrc;
                if (peekRight) peekRight.src = nextSrc;
            }

            function moveSlide(dir) {
                currentSlide = (currentSlide + dir + slides.length) % slides.length;
                updateCarousel();
                resetAutoPlay();
            }

            function goToSlide(index) {
                currentSlide = index;
                updateCarousel();
                resetAutoPlay();
            }

            function startAutoPlay() {
                autoPlayInterval = setInterval(() => moveSlide(1), 7000);
            }

            function resetAutoPlay() {
                clearInterval(autoPlayInterval);
                startAutoPlay();
            }

            document.addEventListener('DOMContentLoaded', () => {
                updateCarousel();
                startAutoPlay();
            });
        </script>
    @endpush
@endsection
