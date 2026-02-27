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

            <!-- Navigation -->
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

                <!-- Slide 4: Huracán Sterrato -->
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
    <div class="showroom-header" style="margin-top: 80px; text-align: center;" data-animate>
        <h2 style="font-size: 3rem; margin-bottom: 15px;">Modelos en Stock</h2>
        <p style="color: var(--lamb-grey-medium); max-width: 600px; margin: 0 auto 50px;">Explore nuestra selección
            exclusiva de vehículos de alto rendimiento, listos para ser entregados. Cada unidad ha sido certificada por
            nuestros técnicos expertos.</p>
    </div>

    <div class="showroom-grid">
        @foreach($coches as $index => $coche)
            <div class="car-card" data-animate style="transition-delay: {{ ($index % 3) * 0.1 }}s">
                <div class="car-card-img">
                    @if($coche->imagen)
                        @if(filter_var($coche->imagen, FILTER_VALIDATE_URL))
                            <img src="{{ $coche->imagen }}" alt="{{ $coche->modelo }}">
                        @elseif(strpos($coche->imagen, 'images/') === 0)
                            <img src="{{ asset($coche->imagen) }}" alt="{{ $coche->modelo }}">
                        @else
                            <img src="{{ asset('storage/' . $coche->imagen) }}" alt="{{ $coche->modelo }}">
                        @endif
                    @else
                        <img src="https://via.placeholder.com/600x400?text=No+Image" alt="Placeholder">
                    @endif
                </div>
                <div class="car-card-body">
                    <div class="car-card-brand">{{ $coche->marca->nombre }}</div>
                    <h3 class="car-card-model">{{ $coche->modelo }}</h3>
                    <div class="car-card-price">{{ number_format($coche->precio, 0, ',', '.') }} €</div>

                    <div class="car-spec-tags">
                        @foreach($coche->especificaciones as $spec)
                            <span class="car-spec-tag">{{ $spec->nombre }}</span>
                        @endforeach
                    </div>

                    <div class="car-card-actions">
                        <a href="{{ route('coches.edit', $coche) }}" class="btn-premium btn-text">Editar Detalles</a>
                        <form action="{{ route('coches.destroy', $coche) }}" method="POST"
                            onsubmit="return confirm('¿Eliminar este vehículo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-premium btn-fill"
                                style="border:none; cursor:pointer;">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="showroom-actions" style="display: flex; justify-content: center; margin-bottom: 60px;" data-animate>
        <a href="{{ route('coches.create') }}" class="btn-premium btn-fill">Añadir Nuevo Vehículo</a>
    </div>

    <div class="pagination-container">
        {{ $coches->links('pagination::bootstrap-5') }}
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
                        // Re-trigger animations by removing and adding active class with reflow
                        slide.classList.remove('active');
                        void slide.offsetWidth; // Force reflow
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });

                // Update Peek Images (Instantly)
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
                updateCarousel(); // Initialize images
                startAutoPlay();
            });
        </script>
    @endpush
@endsection