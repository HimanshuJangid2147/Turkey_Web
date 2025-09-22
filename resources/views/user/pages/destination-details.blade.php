@extends('user.layouts.app')

@section('title', 'Destination Details' )

@section('content')
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
                        <div class="price-section">
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">299</span>
                                <span class="period">per person</span>
                            </div>
                            <div class="price-note">Starting from</div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-primary btn-book-now">
                                <i class="fas fa-calendar-check"></i>
                                Book Now
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-heart"></i>
                                Save
                            </button>
                        </div>
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
                <a href="#itinerary" class="nav-tab">Itinerary</a>
                <a href="#inclusions" class="nav-tab">Inclusions</a>
                <a href="#gallery" class="nav-tab">Gallery</a>
                <a href="#reviews" class="nav-tab">Reviews</a>
                <a href="#booking" class="nav-tab">Book Now</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="content-grid">
                <!-- Left Column - Content -->
                <div class="content-left">
                    <!-- Overview Section -->
                    <section id="overview" class="content-section">
                        <div class="section-header">
                            <h2>Trip Overview</h2>
                            <div class="section-badges">
                                <span class="badge-small">Cultural</span>
                                <span class="badge-small">Historical</span>
                                <span class="badge-small">Photography</span>
                            </div>
                        </div>

                        <div class="overview-content">
                            <p class="lead">Discover the enchanting city where East meets West. Istanbul offers a perfect blend of history, culture, and modern attractions. From the majestic Hagia Sophia to the bustling Grand Bazaar, every corner tells a story of this magnificent city.</p>

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
                        </div>
                    </section>

                    <!-- Itinerary Section -->
                    <section id="itinerary" class="content-section">
                        <div class="section-header">
                            <h2>Day by Day Itinerary</h2>
                            <p class="section-subtitle">A detailed breakdown of your 5-day adventure</p>
                        </div>

                        <div class="itinerary-timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="day">Day 1</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Arrival & Istanbul Welcome</h4>
                                    <p>Arrive in Istanbul, transfer to hotel, welcome dinner with traditional Turkish cuisine</p>
                                    <div class="timeline-meta">
                                        <span><i class="fas fa-bed"></i> Hotel accommodation</span>
                                        <span><i class="fas fa-utensils"></i> Welcome dinner</span>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="day">Day 2</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Historical Peninsula Tour</h4>
                                    <p>Visit Hagia Sophia, Blue Mosque, Hippodrome, and Topkapi Palace</p>
                                    <div class="timeline-meta">
                                        <span><i class="fas fa-camera"></i> Guided tour</span>
                                        <span><i class="fas fa-bus"></i> Transportation included</span>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="day">Day 3</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Bosphorus & Modern Istanbul</h4>
                                    <p>Bosphorus cruise, visit Dolmabahce Palace, explore Taksim Square</p>
                                    <div class="timeline-meta">
                                        <span><i class="fas fa-ship"></i> Bosphorus cruise</span>
                                        <span><i class="fas fa-walking"></i> Walking tour</span>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="day">Day 4</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Grand Bazaar & Shopping</h4>
                                    <p>Explore the famous Grand Bazaar, Spice Market, and local artisan shops</p>
                                    <div class="timeline-meta">
                                        <span><i class="fas fa-shopping-bag"></i> Shopping experience</span>
                                        <span><i class="fas fa-coffee"></i> Turkish coffee tasting</span>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="day">Day 5</span>
                                </div>
                                <div class="timeline-content">
                                    <h4>Departure Day</h4>
                                    <p>Free morning for last-minute exploration, airport transfer</p>
                                    <div class="timeline-meta">
                                        <span><i class="fas fa-plane"></i> Airport transfer</span>
                                        <span><i class="fas fa-clock"></i> Flexible schedule</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Gallery Section -->
                    <section id="gallery" class="content-section">
                        <div class="section-header">
                            <h2>Photo Gallery</h2>
                            <p class="section-subtitle">See what awaits you on this incredible journey</p>
                        </div>

                        <div class="gallery-grid">
                            <div class="gallery-main">
                                <img src="{{ asset('images/istanbul.webp') }}" alt="Main gallery image">
                                <div class="gallery-overlay">
                                    <button class="btn-view-gallery">
                                        <i class="fas fa-images"></i>
                                        View All Photos
                                    </button>
                                </div>
                            </div>

                            <div class="gallery-thumbnails">
                                <div class="thumbnail-item">
                                    <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Gallery thumbnail 1">
                                </div>
                                <div class="thumbnail-item">
                                    <img src="{{ asset('images/Antalya.jpg') }}" alt="Gallery thumbnail 2">
                                </div>
                                <div class="thumbnail-item">
                                    <img src="{{ asset('images/Bodrum.webp') }}" alt="Gallery thumbnail 3">
                                </div>
                                <div class="thumbnail-item">
                                    <img src="{{ asset('images/istanbul.webp') }}" alt="Gallery thumbnail 4">
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Reviews Section -->
                    <section id="reviews" class="content-section">
                        <div class="section-header">
                            <h2>Traveler Reviews</h2>
                            <div class="rating-summary">
                                <div class="overall-rating">
                                    <span class="rating-number">4.8</span>
                                    <div class="rating-stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="review-count">Based on 2,847 reviews</span>
                                </div>
                            </div>
                        </div>

                        <div class="reviews-list">
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar">
                                            <img src="{{ asset('images/avatar1.jpg') }}" alt="Reviewer">
                                        </div>
                                        <div class="reviewer-details">
                                            <h5>Sarah Johnson</h5>
                                            <span class="review-date">March 2024</span>
                                        </div>
                                    </div>
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="review-text">"Absolutely incredible experience! The tour guide was knowledgeable and the itinerary was perfectly planned. Istanbul is truly magical!"</p>
                            </div>

                            <div class="review-item">
                                <div class="review-header">
                                    <div class="reviewer-info">
                                        <div class="reviewer-avatar">
                                            <img src="{{ asset('images/avatar2.jpg') }}" alt="Reviewer">
                                        </div>
                                        <div class="reviewer-details">
                                            <h5>Michael Chen</h5>
                                            <span class="review-date">February 2024</span>
                                        </div>
                                    </div>
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="review-text">"Best trip ever! The Bosphorus cruise was breathtaking and the food was amazing. Highly recommend this tour!"</p>
                            </div>
                        </div>

                        <div class="reviews-cta">
                            <button class="btn btn-outline">Read All Reviews</button>
                        </div>
                    </section>
                </div>

                <!-- Right Column - Booking Card -->
                <div class="content-right">
                    <div class="booking-card sticky">
                        <div class="card-header">
                            <h3>Book This Trip</h3>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.8 (2,847 reviews)</span>
                            </div>
                        </div>

                        <div class="booking-form">
                            <div class="price-breakdown">
                                <div class="price-main">
                                    <span class="label">From</span>
                                    <div class="amount">
                                        <span class="currency">$</span>
                                        <span class="price">299</span>
                                        <span class="period">per person</span>
                                    </div>
                                </div>
                            </div>

                            <form class="booking-details">
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <input type="date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Number of Travelers</label>
                                    <select class="form-control" required>
                                        <option value="">Select travelers</option>
                                        <option value="1">1 Person</option>
                                        <option value="2">2 People</option>
                                        <option value="3">3 People</option>
                                        <option value="4">4 People</option>
                                        <option value="5">5+ People</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Special Requirements</label>
                                    <textarea class="form-control" rows="3" placeholder="Any special requests or dietary requirements..."></textarea>
                                </div>

                                <div class="booking-summary">
                                    <div class="summary-item">
                                        <span>Subtotal</span>
                                        <span>$299</span>
                                    </div>
                                    <div class="summary-item">
                                        <span>Taxes & Fees</span>
                                        <span>$45</span>
                                    </div>
                                    <div class="summary-total">
                                        <span>Total</span>
                                        <span>$344</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-book">
                                    <i class="fas fa-credit-card"></i>
                                    Proceed to Payment
                                </button>
                            </form>
                        </div>

                        <div class="booking-features">
                            <h4>Why Book With Us?</h4>
                            <ul class="features-list">
                                <li><i class="fas fa-check"></i> Best Price Guarantee</li>
                                <li><i class="fas fa-check"></i> 24/7 Customer Support</li>
                                <li><i class="fas fa-check"></i> Free Cancellation</li>
                                <li><i class="fas fa-check"></i> Expert Local Guides</li>
                                <li><i class="fas fa-check"></i> Premium Accommodations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Destinations -->
    <section class="related-destinations">
        <div class="container">
            <div class="section-header text-center">
                <h2>You Might Also Like</h2>
                <p>Similar destinations that match your interests</p>
            </div>

            <div class="related-grid">
                <div class="related-card">
                    <div class="related-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Cappadocia">
                    </div>
                    <div class="related-content">
                        <h4>Cappadocia Adventure</h4>
                        <p>Balloon rides & cave hotels</p>
                        <div class="related-price">
                            <span class="currency">$</span>
                            <span class="amount">199</span>
                        </div>
                    </div>
                </div>

                <div class="related-card">
                    <div class="related-image">
                        <img src="{{ asset('images/Antalya.jpg') }}" alt="Antalya">
                    </div>
                    <div class="related-content">
                        <h4>Antalya Beach Resort</h4>
                        <p>Luxury Mediterranean escape</p>
                        <div class="related-price">
                            <span class="currency">$</span>
                            <span class="amount">599</span>
                        </div>
                    </div>
                </div>

                <div class="related-card">
                    <div class="related-image">
                        <img src="{{ asset('images/Bodrum.webp') }}" alt="Bodrum">
                    </div>
                    <div class="related-content">
                        <h4>Bodrum Coastal Paradise</h4>
                        <p>Crystal clear waters</p>
                        <div class="related-price">
                            <span class="currency">$</span>
                            <span class="amount">149</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/destination-details.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/user/destination-details.js') }}"></script>
@endpush
