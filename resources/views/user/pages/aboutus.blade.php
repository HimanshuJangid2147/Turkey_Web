@extends('user.layouts.app')
@section('title', 'About Us')
@section('content')
    @php
        $breadcrumbs = [['title' => 'About Us', 'url' => '/aboutus']];
    @endphp

    @php
        $aboutUsCards = [
            [
                'title' => 'Our Mission',
                'icon' => 'fa-compass',
                'img' => asset('images/2d.jpg'),
                'description' =>
                    'To craft unforgettable travel experiences by blending local authenticity with world-class service. We are dedicated to creating seamless, personalized journeys that allow our guests to discover the rich culture, vibrant history, and spiritual heart of Rajasthan and beyond, ensuring every trip is a cherished memory.',
            ],
            [
                'title' => 'Our Vision',
                'icon' => 'fa-eye',
                'img' => asset('images/7-Days_Highlights.jfif'),
                'description' =>
                    'To be the most trusted and innovative travel partner for exploring the wonders of India. We envision a future where travel is not only about seeing new places but also about fostering a deeper understanding and appreciation for diverse cultures, all while promoting sustainable and responsible tourism practices.',
            ],
            [
                'title' => 'Our Values',
                'icon' => 'fa-heart',
                'img' => asset('images/Konya.jpg'),
                'description' =>
                    'Our actions are guided by a core set of principles: Guest-Centricity, where your journey is our priority; Authenticity, connecting you with genuine culture; Integrity, ensuring transparent and honest practices; and Passion, pouring our love for discovery into every itinerary we create.',
            ],
        ];
    @endphp

    {{-- Include Breadcrumb --}}
    <section class="breadcrumb-section">
        @include('user.partials.breadcrum')
    </section>

    {{-- Enhanced Hero Section --}}
    <section class="about-hero position-relative overflow-hidden">
        <div class="hero-background" style="background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.4)), url('{{ asset('images/Untitled.png') }}') center/cover;">
        </div>
        <div class="container hero-content text-center text-white py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4 animate-fade-in">About Us</h1>
                    <p class="lead fs-5 mb-4 animate-fade-in-delay">Discover the story behind our company and our commitment to providing exceptional travel experiences that connect hearts with destinations.</p>
                    <div class="hero-decoration">
                        <div class="decoration-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="stats-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4 mb-md-0">
                    <div class="stat-item">
                        <h3 class="display-4 fw-bold counter" data-count="500">0</h3>
                        <p class="mb-0">Happy Travelers</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4 mb-md-0">
                    <div class="stat-item">
                        <h3 class="display-4 fw-bold counter" data-count="15">0</h3>
                        <p class="mb-0">Years Experience</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3 class="display-4 fw-bold counter" data-count="50">0</h3>
                        <p class="mb-0">Destinations</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3 class="display-4 fw-bold counter" data-count="98">0</h3>
                        <p class="mb-0">Success Rate %</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Enhanced About Cards Section --}}
    <section class="about-cards-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">What Drives Us</h2>
                    <p class="lead text-muted">Our commitment to excellence is built on three fundamental pillars</p>
                </div>
            </div>

            @foreach ($aboutUsCards as $index => $card)
                <div class="row align-items-center mb-5 @if($index % 2 !== 0) flex-row-reverse @endif">
                    {{-- Image Column --}}
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="image-container position-relative overflow-hidden rounded-4 shadow-lg">
                            <img src="{{ $card['img'] }}" alt="{{ $card['title'] }}" class="img-fluid w-100 h-100 object-fit-cover hover-scale">
                            <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                <div class="icon-circle bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center">
                                    <i class="fas {{ $card['icon'] }} text-primary fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Text Column --}}
                    <div class="col-lg-6">
                        <div class="content-wrapper @if($index % 2 !== 0) pe-lg-5 @else ps-lg-5 @endif">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-badge bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                                    <i class="fas {{ $card['icon'] }} text-primary fs-4"></i>
                                </div>
                                <h3 class="h2 fw-bold mb-0 text-primary">{{ $card['title'] }}</h3>
                            </div>
                            <p class="text-muted lh-lg fs-6">{{ $card['description'] }}</p>
                            <div class="feature-highlight mt-4">
                                <div class="highlight-line bg-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Call to Action Section --}}
    <section class="cta-section py-5 bg-gradient">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h3 class="display-6 fw-bold text-gray  mb-3">Ready to Start Your Journey?</h3>
                    <p class="lead text-steel mb-4 opacity-90">Let us craft your perfect travel experience with our expertise and passion for discovery.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="/contact" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold">
                            <i class="fas fa-paper-plane me-2"></i>Get In Touch
                        </a>
                        <a href="/packages" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-semibold">
                            <i class="fas fa-route me-2"></i>View Packages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Styles --}}
    <style>
        .about-hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .decoration-line {
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #17a2b8, #1b272c);
            margin: 0 auto;
            border-radius: 2px;
        }

        .stats-section {
            background: linear-gradient(135deg, #17a2b8, #1b272c);
        }

        .stat-item {
            padding: 1rem;
        }

        .counter {
            transition: all 0.3s ease;
        }

        .image-container {
            height: 400px;
            transition: transform 0.3s ease;
        }

        .image-container:hover {
            transform: translateY(-5px);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .image-container:hover .hover-scale {
            transform: scale(1.05);
        }

        .image-overlay {
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .image-container:hover .icon-circle {
            transform: scale(1);
        }

        .icon-badge {
            transition: all 0.3s ease;
        }

        .content-wrapper:hover .icon-badge {
            transform: scale(1.1);
        }

        .highlight-line {
            width: 60px;
            height: 3px;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .content-wrapper:hover .highlight-line {
            width: 100px;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .animate-fade-in {
            animation: fadeInUp 1s ease;
        }

        .animate-fade-in-delay {
            animation: fadeInUp 1s ease 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            .about-hero {
                min-height: 50vh;
            }

            .image-container {
                height: 250px;
            }

            .display-4 {
                font-size: 2.5rem;
            }

            .display-5 {
                font-size: 2rem;
            }
        }
    </style>

    {{-- JavaScript for Counter Animation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');

            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current);
                }, 16);
            };

            // Intersection Observer for counter animation
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            });

            counters.forEach(counter => observer.observe(counter));
        });
    </script>
@endsection
