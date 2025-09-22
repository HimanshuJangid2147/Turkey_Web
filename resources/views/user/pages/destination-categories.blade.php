@extends('user.layouts.app')

@section('title', 'Destination Categories - Explore Travel Types')

@section('content')
    @php
        $breadcrumbs = [['title' => 'Destination Categories', 'url' => '/destination-categories']];
    @endphp

    <!-- Hero Section -->
    <section class="categories-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Explore by Travel Type</h1>
                <p class="hero-subtitle">Discover destinations based on your preferred travel style and interests</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">200+</span>
                        <span class="stat-label">Destinations</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">1000+</span>
                        <span class="stat-label">Happy Travelers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Filter -->
    <section class="categories-filter">
        <div class="container">
            <div class="filter-header">
                <h2>Filter by Interest</h2>
                <div class="filter-tags">
                    <button class="filter-tag active" data-filter="all">All Categories</button>
                    <button class="filter-tag" data-filter="cultural">Cultural</button>
                    <button class="filter-tag" data-filter="adventure">Adventure</button>
                    <button class="filter-tag" data-filter="beach">Beach</button>
                    <button class="filter-tag" data-filter="nature">Nature</button>
                    <button class="filter-tag" data-filter="luxury">Luxury</button>
                    <button class="filter-tag" data-filter="family">Family</button>
                    <button class="filter-tag" data-filter="budget">Budget</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="categories-grid-section">
        <div class="container">
            <div class="categories-grid">
                <!-- Cultural Destinations -->
                <div class="category-card" data-category="cultural">
                    <div class="category-image">
                        <img src="{{ asset('images/istanbul.webp') }}" alt="Cultural Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Cultural Tours</h3>
                        <p>Immerse yourself in rich history, ancient ruins, and local traditions</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 25 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 500+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Cultural Tours</a>
                    </div>
                </div>

                <!-- Adventure Destinations -->
                <div class="category-card" data-category="adventure">
                    <div class="category-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Adventure Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-mountain"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Adventure Travel</h3>
                        <p>Experience thrilling activities, hiking, and outdoor adventures</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 18 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 300+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Adventures</a>
                    </div>
                </div>

                <!-- Beach Destinations -->
                <div class="category-card" data-category="beach">
                    <div class="category-image">
                        <img src="{{ asset('images/Bodrum.webp') }}" alt="Beach Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-umbrella-beach"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Beach Holidays</h3>
                        <p>Relax on pristine beaches and enjoy crystal clear waters</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 15 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 400+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Beaches</a>
                    </div>
                </div>

                <!-- Nature Destinations -->
                <div class="category-card" data-category="nature">
                    <div class="category-image">
                        <img src="{{ asset('images/Antalya.jpg') }}" alt="Nature Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Nature & Wildlife</h3>
                        <p>Discover breathtaking landscapes and observe wildlife in their habitat</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 20 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 250+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Nature</a>
                    </div>
                </div>

                <!-- Luxury Destinations -->
                <div class="category-card" data-category="luxury">
                    <div class="category-image">
                        <img src="{{ asset('images/istanbul.webp') }}" alt="Luxury Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Luxury Travel</h3>
                        <p>Indulge in premium experiences with world-class amenities</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 12 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 150+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Luxury</a>
                    </div>
                </div>

                <!-- Family Destinations -->
                <div class="category-card" data-category="family">
                    <div class="category-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Family Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Family Friendly</h3>
                        <p>Perfect destinations for family vacations with kid-friendly activities</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 22 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 600+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Family Trips</a>
                    </div>
                </div>

                <!-- Budget Destinations -->
                <div class="category-card" data-category="budget">
                    <div class="category-image">
                        <img src="{{ asset('images/Bodrum.webp') }}" alt="Budget Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Budget Travel</h3>
                        <p>Amazing experiences that won't break the bank</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 30 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 800+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Budget Options</a>
                    </div>
                </div>

                <!-- Food & Wine -->
                <div class="category-card" data-category="cultural">
                    <div class="category-image">
                        <img src="{{ asset('images/Antalya.jpg') }}" alt="Food & Wine Destinations">
                        <div class="category-overlay">
                            <div class="category-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-content">
                        <h3>Food & Wine Tours</h3>
                        <p>Savor delicious cuisine and taste exceptional wines</p>
                        <div class="category-stats">
                            <span class="stat"><i class="fas fa-map-marker-alt"></i> 16 Destinations</span>
                            <span class="stat"><i class="fas fa-users"></i> 200+ Tours</span>
                        </div>
                        <a href="#" class="btn-category">Explore Culinary Tours</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="popular-categories">
        <div class="container">
            <div class="section-header text-center">
                <h2>Most Popular Categories</h2>
                <p>Discover what other travelers are loving right now</p>
            </div>

            <div class="popular-grid">
                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h4>Trending Now</h4>
                    <p>Cappadocia Balloon Tours</p>
                    <span class="popular-count">2.5k+ bookings</span>
                </div>

                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Top Rated</h4>
                    <p>Istanbul Historical Tours</p>
                    <span class="popular-count">4.9/5 rating</span>
                </div>

                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Quick Getaways</h4>
                    <p>Weekend Trips</p>
                    <span class="popular-count">1-3 days</span>
                </div>

                <div class="popular-item">
                    <div class="popular-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Fan Favorites</h4>
                    <p>Antalya Beach Resorts</p>
                    <span class="popular-count">3k+ reviews</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="newsletter-cta">
        <div class="container">
            <div class="cta-content text-center">
                <h2>Get Personalized Travel Recommendations</h2>
                <p>Subscribe to receive travel deals and destination suggestions based on your preferences</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn-subscribe">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/destination-categories.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/user/destination-categories.js') }}"></script>
@endpush
