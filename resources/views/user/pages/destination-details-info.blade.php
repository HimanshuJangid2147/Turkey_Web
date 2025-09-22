@extends('user.layouts.app')

@section('title', 'Destination Details')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/destination-details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/tabs.css') }}">
@endpush

@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Destinations', 'url' => '/destinations'],
            // ['title' => $destinationName ?? 'Destination', 'url' => '#'],
        ];
    @endphp

    <!-- Hero Section -->
    <section class="destination-hero">
        <div class="hero-image">
            <img src="{{ asset('images/istanbul.webp') }}" alt="{{ $destinationName ?? 'Destination' }}">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <div class="hero-info">
                    <div class="destination-badges">
                        <span class="badge badge-primary">Featured</span>
                        <span class="badge badge-success">4.8 ⭐</span>
                    </div>
                    <h1 class="hero-title">{{ $destinationName ?? 'Istanbul Historical Tour' }}</h1>
                    <p class="hero-subtitle">Experience the magical blend of East and West in Turkey's cultural capital</p>

                    <div class="hero-meta">
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Turkey</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>5 Days, 4 Nights</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Available Year Round</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-share-alt"></i>
                            Share
                        </button>
                        <button class="btn btn-outline">
                            <i class="fas fa-heart"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Navigation -->
    <section class="quick-nav">
        <div class="container">
            <div class="nav-tabs">
                <a href="#overview" class="nav-tab active">Overview</a>
                <a href="#highlights" class="nav-tab">Highlights</a>
                <a href="#history" class="nav-tab">History & Culture</a>
                <a href="#gallery" class="nav-tab">Gallery</a>
                <a href="#tips" class="nav-tab">Travel Tips</a>
                <a href="#reviews" class="nav-tab">Reviews</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="content-wrapper">
                <!-- Left Column - Content -->
                <div class="content-main">
                    <!-- Overview Section -->
                    <section id="overview" class="content-section">
                        <div class="section-header">
                            <h2>About This Destination</h2>
                            <div class="section-badges">
                                <span class="badge-small">Cultural</span>
                                <span class="badge-small">Historical</span>
                                <span class="badge-small">UNESCO Sites</span>
                            </div>
                        </div>

                        <div class="overview-content">
                            <p class="lead">Istanbul, once known as Constantinople, is the most populous city in Turkey and the country's economic, cultural, and historic center. The city straddles the Bosphorus strait, lying in both Europe and Asia, and has a long and complex history dating back to ancient times.</p>

                            <p>Formerly the capital of the Byzantine and Ottoman Empires, Istanbul is home to some of the world's most iconic architectural marvels, including the Hagia Sophia, Blue Mosque, and Topkapi Palace. The city's unique position as a bridge between two continents has made it a melting pot of cultures, cuisines, and traditions.</p>

                            <div class="destination-facts">
                                <div class="fact-grid">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h4>Population</h4>
                                            <p>15.5 million people call Istanbul home</p>
                                        </div>
                                    </div>

                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h4>Location</h4>
                                            <p>Europe, Asia, Middle East</p>
                                        </div>
                                    </div>

                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h4>Availability</h4>
                                            <p>Year Round</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Highlights Section -->
                    <section id="highlights" class="content-section">
                        <div class="section-header">
                            <h2>Highlights</h2>
                        </div>

                        <div class="highlights-grid">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-landmark"></i>
                                </div>
                                <div class="highlight-content">
                                    <h4>Historical Sites</h4>
                                    <p>Visit iconic landmarks including Hagia Sophia, Blue Mosque, and Topkapi Palace</p>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <div class="highlight-content">
                                    <h4>Photography</h4>
                                    <p>Capture stunning moments at Bosphorus Strait and ancient city walls</p>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div class="highlight-content">
                                    <h4>Local Cuisine</h4>
                                    <p>Taste authentic Turkish dishes and experience traditional cooking</p>
                                </div>
                            </div>

                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="highlight-content">
                                    <h4>Local Culture</h4>
                                    <p>Immerse yourself in Turkish hospitality and traditions</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="history" class="content-section">
                        <div class="section-header">
                            <h2>History & Culture</h2>
                        </div>

                        <div class="history-content">
                            <div class="history-grid">
                                <div class="history-item">
                                    <div class="history-icon">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div class="history-content">
                                        <h4>Historical Sites</h4>
                                        <p>Visit iconic landmarks including Hagia Sophia, Blue Mosque, and Topkapi Palace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="gallery" class="content-section">
                        <div class="section-header">
                            <h2>Gallery</h2>
                        </div>

                        <div class="gallery-content">
                            <div class="gallery-grid">
                                <div class="gallery-item">
                                    <div class="gallery-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <div class="gallery-content">
                                        <h4>Local Cuisine</h4>
                                        <p>Taste authentic Turkish dishes and experience traditional cooking</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="tips" class="content-section">
                        <div class="section-header">
                            <h2>Travel Tips</h2>
                        </div>

                        <div class="tips-content">
                            <div class="tips-grid">
                                <div class="tips-item">
                                    <div class="tips-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="tips-content">
                                        <h4>Local Culture</h4>
                                        <p>Immerse yourself in Turkish hospitality and traditions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endsection
