@extends('user.layouts.app')
@section('content')
    <?php
    $heroimageUrl = asset('images/Untitled.png');
    $videoUrl = asset('videos/turkey-travel.mp4');
    $istanbulImage = asset('images/istanbul.webp');
    $cappadociaImage = asset('images/Cappadocia.jpg');
    $bodrumImage = asset('images/Bodrum.webp');
    $antalyaImage = asset('images/Antalya.jpg');
    $dealsImages = [asset('images/Konya.jpg'), asset('images/Istanbul-Sightseeing.jpg'), asset('images/7-Days_Highlights.jfif'), asset('images/2d.jpg')];
    $instagramImages = [asset('images/Cappadocia.jpg'), asset('images/Bodrum.webp'), asset('images/Antalya.jpg'), asset('images/Konya.jpg'), asset('images/istanbul.webp'), asset('images/7-Days_Highlights.jfif'), asset('images/2d.jpg'), asset('images/Istanbul-Sightseeing.jpg'), asset('images/Cappadocia.jpg')];
    ?>

    {{-- Enhanced Hero Section --}}
    <section class="hero-section position-relative vh-75">
        <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="8000">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="<?php echo $heroimageUrl; ?>" class="d-block w-100 h-100 object-fit-cover"
                        alt="Guaranteed Tours in Turkey">
                </div>
                <div class="carousel-item h-100">
                    <video class="d-block w-100 h-100 object-fit-cover hero-video" autoplay muted loop playsinline>
                        <source src="<?php echo $videoUrl; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
        </div>

        <div class="hero-text-overlay d-flex align-items-center">
            <div class="container">
                <div class="row">
                        <div class="hero-content">
                            <h1 class="hero-title">
                                Guaranteed Departed Tours<br>
                            </h1>
                            <p class="hero-subtitle">
                                The fabulous destinations Istanbul, Gallipoli, Troy, Pergamon, Kusadasi, Ephesus, Sirince, Pamukkale, Antalya, Konya, Cappadocia are all in with Guaranteed Departure theme. It departs 4 times every month from Istanbul, is full of shouldn't be missed attractions, local shopping opportunities, traditional cuisine tastings, and remarkable night shows.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-3">
                                <button class="btn hero-btn text-white">
                                    <i class="bi bi-compass-fill me-2"></i>
                                    See Tours
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Enhanced Destinations Section --}}
    <section class="container my-5 py-5">
        <div class="text-center section-header fade-in-up">
            <p class="section-badge">Discover Amazing Places</p>
            <h2 class="section-title">Inbound Packages</h2>
            <p class="section-subtitle">
                Explore Turkey's most captivating destinations, each offering unique experiences and unforgettable memories that will last a lifetime.
            </p>
            <div class="section-divider">
                <span class="divider-dot"></span>
                <span class="divider-dot"></span>
                <i class="bi bi-geo-alt-fill divider-icon fs-4"></i>
                <span class="divider-dot"></span>
                <span class="divider-dot"></span>
            </div>
        </div>

        <div class="row g-4">
            @php
                $destinations = [
                    ['image' => $istanbulImage, 'name' => 'Istanbul', 'description' => 'Where East meets West'],
                    ['image' => $cappadociaImage, 'name' => 'Cappadocia', 'description' => 'Land of Fairy Chimneys'],
                    ['image' => $bodrumImage, 'name' => 'Bodrum', 'description' => 'Turkish Riviera Paradise'],
                    ['image' => $antalyaImage, 'name' => 'Antalya', 'description' => 'Gateway to the Mediterranean']
                ]
            @endphp

            @foreach ($destinations as $index => $destination)
                <div class="col-12 col-md-6 col-lg-3 fade-in-up" style="animation-delay: {{ $index * 0.2 }}s">
                    <div class="destination-card">
                        <img src="{{ $destination['image'] }}" class="w-100 h-100 object-fit-cover" alt="{{ $destination['name'] }}">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-4">
                            <h5 class="destination-title mb-1">{{ $destination['name'] }}</h5>
                            <p class="text-white-50 mb-3">{{ $destination['description'] }}</p>
                            <button class="btn btn-outline-light btn-sm rounded-pill align-self-start">
                                Explore <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn hero-btn text-white">
                <i class="bi bi-map-fill me-2"></i>
                View All Destinations
            </a>
        </div>
    </section>

    {{-- Enhanced Deals & Promotions Section --}}
    <section class="py-5">
        <div class="container my-5">
            <div class="text-center section-header fade-in-up">
                <p class="section-badge">Limited Time Offers</p>
                <h2 class="section-title">Outbound Packages</h2>
                <p class="section-subtitle">
                    Don't miss these incredible offers! Book now and save on your dream Turkish vacation with our specially curated tour packages.
                </p>
                <div class="section-divider">
                    <span class="divider-dot"></span>
                    <span class="divider-dot"></span>
                    <i class="bi bi-percent divider-icon fs-4"></i>
                    <span class="divider-dot"></span>
                    <span class="divider-dot"></span>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $deals = [
                        ['image' => $dealsImages[0], 'title' => 'Mystical Konya Experience', 'category' => 'Cultural Tour', 'original_price' => '€89.00', 'current_price' => '€62.30'],
                        ['image' => $dealsImages[1], 'title' => 'Istanbul City Explorer', 'category' => 'City Sightseeing', 'original_price' => '€120.00', 'current_price' => '€84.00'],
                        ['image' => $dealsImages[2], 'title' => '7-Day Turkey Highlights', 'category' => 'Adventure Package', 'original_price' => '€450.00', 'current_price' => '€315.00'],
                        ['image' => $dealsImages[3], 'title' => 'Cappadocia Balloon Adventure', 'category' => 'Unique Experience', 'original_price' => '€180.00', 'current_price' => '€126.00']
                    ]
                @endphp

                @foreach ($deals as $index => $deal)
                    <div class="col-12 col-md-6 col-lg-3 fade-in-up" style="animation-delay: {{ $index * 0.15 }}s">
                        <div class="deals-card">
                            <div class="position-relative">
                                <img src="{{ $deal['image'] }}" class="card-img-top" alt="{{ $deal['title'] }}">
                                <span class="position-absolute top-0 start-0 m-3 discount-badge">
                                    <i class="bi bi-lightning-fill me-1"></i>30% Off
                                </span>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <button class="btn btn-light btn-sm rounded-circle">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <span class="badge bg-info text-dark mb-2">{{ $deal['category'] }}</span>
                                <h6 class="card-title fw-bold mb-3">{{ $deal['title'] }}</h6>
                                <div class="price-section mb-3">
                                    <span class="text-muted small">From</span>
                                    <span class="original-price ms-1">{{ $deal['original_price'] }}</span>
                                    <span class="current-price ms-2">{{ $deal['current_price'] }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <small class="text-muted">4.8 (124)</small>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm rounded-pill">
                                        Book Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Enhanced Why Choose Us Section --}}
    <section class="container my-5 py-5">
        <div class="why-choose-section">
            <div class="text-center section-header fade-in-up">
                <p class="section-badge">Why Turkey Travel</p>
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">
                    Experience the difference with our expert local knowledge, personalized service, and commitment to creating unforgettable memories that last a lifetime.
                </p>
            </div>

            <div class="row g-5">
                @php
                    $features = [
                        [
                            'icon' => 'bi-clock-history',
                            'title' => 'Over 35 Years of Excellence',
                            'description' => 'Three decades of crafting extraordinary Turkish adventures with unmatched expertise and local insights.'
                        ],
                        [
                            'icon' => 'bi-calendar-check',
                            'title' => 'Flexible Booking Options',
                            'description' => 'Life happens, plans change. Enjoy peace of mind with our flexible booking and cancellation policies.'
                        ],
                        [
                            'icon' => 'bi-people-fill',
                            'title' => 'Curated Travel Communities',
                            'description' => 'Connect with like-minded explorers who share your passion for authentic cultural experiences.'
                        ],
                        [
                            'icon' => 'bi-award-fill',
                            'title' => 'Personalized Experiences',
                            'description' => 'Every journey is tailored to your interests, ensuring your Turkish adventure is uniquely yours.'
                        ]
                    ]
                @endphp

                @foreach ($features as $index => $feature)
                    <div class="col-12 col-md-6 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="feature-item d-flex align-items-start">
                            <div class="feature-icon">
                                <i class="bi {{ $feature['icon'] }} text-white fs-3"></i>
                            </div>
                            <div>
                                <h5 class="feature-title">{{ $feature['title'] }}</h5>
                                <p class="feature-description mb-0">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Enhanced Testimonials Section --}}
    <section class="py-5">
        <div class="container my-5">
            <div class="text-center section-header fade-in-up">
                <p class="section-badge">Client Stories</p>
                <h2 class="section-title">What Travelers Say</h2>
                <p class="section-subtitle">
                    Real experiences from real travelers. Discover why thousands choose us for their Turkish adventures and create memories that last forever.
                </p>
                <div class="section-divider">
                    <span class="divider-dot"></span>
                    <span class="divider-dot"></span>
                    <i class="bi bi-chat-heart-fill divider-icon fs-4"></i>
                    <span class="divider-dot"></span>
                    <span class="divider-dot"></span>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $testimonials = [
                        [
                            'name' => 'Sarah Johnson',
                            'initials' => 'SJ',
                            'rating' => 5,
                            'date' => '2 weeks ago',
                            'text' => 'Absolutely incredible experience! The Istanbul tour was perfectly organized, and our guide was knowledgeable and friendly. The hidden gems we discovered were beyond amazing.',
                            'verified' => true
                        ],
                        [
                            'name' => 'Michael Chen',
                            'initials' => 'MC',
                            'rating' => 5,
                            'date' => '1 month ago',
                            'text' => 'Cappadocia balloon ride was a dream come true! Professional service, breathtaking views, and memories that will last forever. Highly recommend!',
                            'verified' => true
                        ],
                        [
                            'name' => 'Emma Rodriguez',
                            'initials' => 'ER',
                            'rating' => 4,
                            'date' => '3 weeks ago',
                            'text' => 'Fantastic cultural immersion experience. The local cuisine tours were exceptional, and we felt completely taken care of throughout our journey.',
                            'verified' => false
                        ]
                    ]
                @endphp

                @foreach ($testimonials as $index => $testimonial)
                    <div class="col-12 col-md-6 col-lg-4 fade-in-up" style="animation-delay: {{ $index * 0.15 }}s">
                        <div class="testimonial-card">
                            <div class="d-flex align-items-center mb-4">
                                <div class="client-avatar">
                                    {{ $testimonial['initials'] }}
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1 d-flex align-items-center">
                                        {{ $testimonial['name'] }}
                                        @if($testimonial['verified'])
                                            <span class="badge bg-success rounded-pill ms-2">
                                                <i class="bi bi-check-circle-fill"></i>
                                            </span>
                                        @endif
                                    </h6>
                                    <div class="star-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star-fill{{ $i <= $testimonial['rating'] ? '' : ' text-muted' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <small class="text-muted">{{ $testimonial['date'] }}</small>
                            </div>
                            <p class="testimonial-text">"{{ $testimonial['text'] }}"</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-reply"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Verified Review</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <button class="btn hero-btn text-white">
                    <i class="bi bi-chat-dots-fill me-2"></i>
                    Read More Reviews
                </button>
            </div>
        </div>
    </section>

    {{-- Enhanced Instagram Section --}}
    <section class="instagram-section">
        <div class="container">
            <div class="text-center section-header fade-in-up">
                <p class="section-badge">Follow Our Journey</p>
                <h2 class="section-title">Instagram Adventures</h2>
                <p class="section-subtitle">
                    Get inspired by real moments from our Turkish adventures. Follow us for daily doses of wanderlust and travel inspiration.
                </p>
            </div>

            <div class="row g-3 mb-5">
                @foreach (array_slice($instagramImages, 0, 6) as $index => $image)
                    <div class="col-6 col-md-4 col-lg-2 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="instagram-post">
                            <img src="{{ $image }}" class="img-fluid w-100" alt="Instagram Post" style="aspect-ratio: 1; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3 text-white">
                                <i class="bi bi-instagram fs-5"></i>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <div class="d-flex gap-2 text-white">
                                    <span><i class="bi bi-heart-fill"></i> {{ rand(50, 500) }}</span>
                                    <span><i class="bi bi-chat-fill"></i> {{ rand(5, 50) }}</span>
                                </div>
                            </div>
                            <div class="instagram-overlay">
                                <i class="bi bi-eye-fill"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <button class="btn hero-btn text-white">
                    <i class="bi bi-instagram me-2"></i>
                    Follow @TurkeyTravel
                </button>
            </div>
        </div>
    </section>

    {{-- Enhanced Newsletter Section --}}
    <section class="newsletter-section" style="background-image: url('<?php echo $heroimageUrl; ?>');">
        <div class="container newsletter-content">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <h2 class="newsletter-title">Join Our Travel Community</h2>
                    <p class="newsletter-subtitle">
                        Subscribe to receive exclusive deals, travel tips, and inspiring stories from Turkey. Be the first to know about our special offers and hidden gem discoveries!
                    </p>

                    <form class="newsletter-form d-flex flex-column flex-md-row gap-3 align-items-stretch">
                        <div class="flex-grow-1">
                            <input type="email" class="newsletter-input w-100"
                                   placeholder="Enter your email address"
                                   aria-label="Email Address">
                        </div>
                        <div>
                            <button class="newsletter-btn" type="submit">
                                <i class="bi bi-send-fill me-2"></i>
                                Subscribe Now
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 d-flex justify-content-center align-items-center gap-4 text-white-50">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-shield-check me-2"></i>
                            <small>Spam-free guarantee</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-gift me-2"></i>
                            <small>Exclusive offers</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-x-circle me-2"></i>
                            <small>Unsubscribe anytime</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JavaScript for Enhanced Interactions --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for fade-in animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe all fade-in-up elements
            document.querySelectorAll('.fade-in-up').forEach(el => {
                observer.observe(el);
            });

            // Enhanced carousel functionality
            const carousel = document.getElementById('heroCarousel');
            if (carousel) {
                const bsCarousel = new bootstrap.Carousel(carousel, {
                    interval: 8000,
                    wrap: true,
                    touch: true,
                    keyboard: true
                });

                // Pause on hover
                carousel.addEventListener('mouseenter', () => bsCarousel.pause());
                carousel.addEventListener('mouseleave', () => bsCarousel.cycle());

                // Keyboard navigation
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') bsCarousel.prev();
                    if (e.key === 'ArrowRight') bsCarousel.next();
                });
            }

            // Newsletter form enhancement
            const newsletterForm = document.querySelector('.newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const btn = this.querySelector('.newsletter-btn');
                    const input = this.querySelector('.newsletter-input');

                    // Add loading state
                    btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Subscribing...';
                    btn.disabled = true;

                    // Simulate subscription
                    setTimeout(() => {
                        btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Subscribed!';
                        btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                        input.value = '';

                        setTimeout(() => {
                            btn.innerHTML = '<i class="bi bi-send-fill me-2"></i>Subscribe Now';
                            btn.style.background = '';
                            btn.disabled = false;
                        }, 3000);
                    }, 2000);
                });
            }

            // Enhanced hover effects for cards
            document.querySelectorAll('.destination-card, .deals-card, .testimonial-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = this.classList.contains('destination-card')
                        ? 'translateY(-15px) scale(1.03)'
                        : 'translateY(-10px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Instagram posts click handler
            document.querySelectorAll('.instagram-post').forEach(post => {
                post.addEventListener('click', function() {
                    // Simulate opening Instagram post
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1.05)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 150);
                    }, 150);
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>

@endsection
