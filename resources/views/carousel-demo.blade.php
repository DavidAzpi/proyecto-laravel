@extends('layouts.master')

@section('title', 'Luxury Carousel')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,700;0,800;1,700;1,800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --lamb-gold: #B8942A;
            --lamb-black: #000000;
            --lamb-white: #FFFFFF;
            --lamb-grey: #f2f2f2;
            --transition-speed: 0.6s;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .carousel-section {
            background-color: var(--lamb-white);
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            overflow-x: hidden;
            padding-top: 40px;
            font-family: 'Barlow Condensed', sans-serif;
        }

        .carousel-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            height: 700px;
        }

        .carousel-track {
            display: flex;
            transition: transform var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            height: 100%;
            align-items: center;
        }

        .carousel-slide {
            flex: 0 0 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity var(--transition-speed);
            opacity: 0.35;
            position: relative;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        /* Model Name Styling */
        .model-name {
            font-style: italic;
            font-weight: 800;
            font-size: 5rem;
            letter-spacing: -2px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        /* Italian Flag Stripe */
        .italy-stripe {
            display: flex;
            width: 250px;
            height: 6px;
            margin-bottom: 20px;
        }

        .stripe-green {
            background: #008C45;
            flex: 1;
        }

        .stripe-white {
            background: #F4F5F0;
            flex: 1;
        }

        .stripe-red {
            background: #CD212A;
            flex: 1;
        }

        /* Tagline */
        .tagline {
            font-weight: 800;
            font-size: 7.5rem;
            line-height: 0.9;
            text-align: center;
            color: #444;
            margin-bottom: -40px;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1;
        }

        /* Car Image */
        .car-image-container {
            width: 100%;
            max-width: 1200px;
            z-index: 2;
            transition: transform 0.5s ease;
        }

        .car-image {
            width: 100%;
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.15));
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            z-index: 3;
        }

        .btn-lamb {
            padding: 15px 35px;
            font-size: 1.1rem;
            font-weight: 700;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .btn-primary {
            background-color: var(--lamb-gold);
            color: white;
        }

        .btn-primary:hover {
            background-color: #a38224;
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--lamb-black);
            color: var(--lamb-black);
        }

        .btn-outline:hover {
            background-color: var(--lamb-black);
            color: white;
        }

        /* Navigation Arrows */
        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            background: transparent;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
            transition: all 0.3s;
        }

        .nav-arrow:hover {
            border-color: var(--lamb-black);
            background: rgba(0, 0, 0, 0.05);
        }

        .arrow-left {
            left: 5%;
        }

        .arrow-right {
            right: 5%;
        }

        /* Pagination */
        .pagination-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            padding: 30px 0;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .dot.active {
            background: var(--lamb-black);
            transform: scale(1.4);
        }

        /* Legal Footer */
        .emissions-footer {
            background-color: #111;
            color: #888;
            padding: 15px 0;
            font-size: 0.75rem;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* Custom Responsive Tweaks */
        @media (max-width: 1200px) {
            .tagline {
                font-size: 5rem;
                margin-bottom: -20px;
            }

            .model-name {
                font-size: 3.5rem;
            }
        }
    </style>

    <div class="carousel-section" id="luxury-carousel">
        <div class="carousel-container">
            <!-- Navigation -->
            <button class="nav-arrow arrow-left" onclick="moveSlide(-1)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="nav-arrow arrow-right" onclick="moveSlide(1)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            <!-- Track -->
            <div class="carousel-track" id="track">
                <!-- Temerario -->
                <div class="carousel-slide active">
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
                    <div class="button-group">
                        <button class="btn-lamb btn-primary">DESCUBRE EL MODELO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></button>
                        <button class="btn-lamb btn-outline">DESCARGUE EL FOLLETO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg></button>
                    </div>
                </div>

                <!-- Urus S -->
                <div class="carousel-slide">
                    <div class="model-name">URUS SE</div>
                    <div class="italy-stripe">
                        <div class="stripe-green"></div>
                        <div class="stripe-white"></div>
                        <div class="stripe-red"></div>
                    </div>
                    <div class="tagline">DARE TO LIVE MORE</div>
                    <div class="car-image-container">
                        <img src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/0_facelift_2025/homepage/models/urus/models_urus_se.png"
                            class="car-image" alt="Urus SE">
                    </div>
                    <div class="button-group">
                        <button class="btn-lamb btn-primary">DESCUBRE EL MODELO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></button>
                        <button class="btn-lamb btn-outline">DESCARGUE EL FOLLETO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg></button>
                    </div>
                </div>

                <!-- Revuelto -->
                <div class="carousel-slide">
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
                    <div class="button-group">
                        <button class="btn-lamb btn-primary">DESCUBRE EL MODELO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></button>
                        <button class="btn-lamb btn-outline">DESCARGUE EL FOLLETO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg></button>
                    </div>
                </div>

                <!-- Sterrato -->
                <div class="carousel-slide">
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
                    <div class="button-group">
                        <button class="btn-lamb btn-primary">DESCUBRE EL MODELO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg></button>
                        <button class="btn-lamb btn-outline">DESCARGUE EL FOLLETO <svg width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-dots">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
            <div class="dot" onclick="goToSlide(3)"></div>
        </div>

        <!-- Disclaimer -->
        <div class="emissions-footer">
            CONSUMO COMBINADO: 11,8-13,5 L/100KM | EMISIONES DE CO2 COMBINADAS: 278-312 G/KM (WLTP)
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.dot');
        const track = document.getElementById('track');
        let autoPlayInterval;

        function updateCarousel() {
            track.style.transform = `translateX(-${currentSlide * 100}%)`;

            slides.forEach((slide, index) => {
                slide.classList.toggle('active', index === currentSlide);
            });

            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
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
            autoPlayInterval = setInterval(() => moveSlide(1), 5000);
        }

        function resetAutoPlay() {
            clearInterval(autoPlayInterval);
            startAutoPlay();
        }

        // Keyboard support
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') moveSlide(-1);
            if (e.key === 'ArrowRight') moveSlide(1);
        });

        // Hover support
        const carouselEl = document.getElementById('luxury-carousel');
        carouselEl.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        carouselEl.addEventListener('mouseleave', () => startAutoPlay());

        // Swipe support
        let touchStartX = 0;
        carouselEl.addEventListener('touchstart', (e) => touchStartX = e.touches[0].clientX);
        carouselEl.addEventListener('touchend', (e) => {
            const touchEndX = e.changedTouches[0].clientX;
            if (touchStartX - touchEndX > 50) moveSlide(1);
            if (touchEndX - touchStartX > 50) moveSlide(-1);
        });

        startAutoPlay();
    </script>
@endsection