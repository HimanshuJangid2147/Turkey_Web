@extends('user.layouts.app')

@section('title', 'Popular Destinations - Trending Travel Spots')

@section('content')
    @php
        $breadcrumbs = [['title' => 'Popular Destinations', 'url' => '/popular-destinations']];
    @endphp
    <!-- Hero Section -->
    <section class="popular-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Popular Destinations</h1>
                <p class="hero-subtitle">Discover the most sought-after destinations loved by travelers worldwide</p>
                <div class="hero-badges">
                    <span class="badge">🔥 Trending</span>
                    <span class="badge">⭐ Top Rated</span>
                    <span class="badge">💎 Premium</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Filters -->
    <section class="quick-filters">
        <div class="container">
            <div class="filters-wrapper">
                <div class="filter-group">
                    <label>Duration</label>
                    <select class="filter-select" id="durationFilter">
                        <option value="all">Any Duration</option>
                        <option value="1-3">1-3 Days</option>
                        <option value="4-7">4-7 Days</option>
                        <option value="8-14">8-14 Days</option>
                        <option value="15+">15+ Days</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Budget</label>
                    <select class="filter-select" id="budgetFilter">
                        <option value="all">Any Budget</option>
                        <option value="budget">Budget (< $500)</option>
                        <option value="mid">Mid Range ($500-$1500)</option>
                        <option value="luxury">Luxury ($1500+)</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Travel Type</label>
                    <select class="filter-select" id="typeFilter">
                        <option value="all">All Types</option>
                        <option value="cultural">Cultural</option>
                        <option value="adventure">Adventure</option>
                        <option value="beach">Beach</option>
                        <option value="nature">Nature</option>
                    </select>
                </div>

                <button class="btn-reset" id="resetFilters">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="featured-destinations">
        <div class="container">
            <div class="section-header text-center">
                <h2>Featured Destinations</h2>
                <p>Hand-picked destinations that are currently trending among travelers</p>
            </div>

            <div class="destinations-grid">
                <!-- Istanbul -->
                <div class="destination-card featured" data-duration="4-7" data-budget="mid" data-type="cultural">
                    <div class="destination-badge">Most Popular</div>
                    <div class="destination-image">
                        <img src="{{ asset('images/istanbul.webp') }}" alt="Istanbul">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.9</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">299</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 5 Days</span>
                        </div>
                        <h3>Istanbul Historical Tour</h3>
                        <p>Explore the magical blend of East and West in Turkey's cultural capital</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-camera"></i> Photography</span>
                            <span class="feature"><i class="fas fa-utensils"></i> Local Cuisine</span>
                            <span class="feature"><i class="fas fa-mosque"></i> Historical Sites</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>2,847 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <!-- Cappadocia -->
                <div class="destination-card" data-duration="1-3" data-budget="mid" data-type="adventure">
                    <div class="destination-badge special">Hot Deal</div>
                    <div class="destination-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Cappadocia">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.8</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">199</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 2 Days</span>
                        </div>
                        <h3>Cappadocia Balloon Adventure</h3>
                        <p>Soar above fairy chimneys and experience magical landscapes from above</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-hot-air-balloon"></i> Balloon Ride</span>
                            <span class="feature"><i class="fas fa-hiking"></i> Cave Exploration</span>
                            <span class="feature"><i class="fas fa-camera"></i> Photography</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>1,923 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <!-- Antalya -->
                <div class="destination-card" data-duration="4-7" data-budget="luxury" data-type="beach">
                    <div class="destination-badge luxury">Luxury</div>
                    <div class="destination-image">
                        <img src="{{ asset('images/Antalya.jpg') }}" alt="Antalya">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.7</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">599</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 6 Days</span>
                        </div>
                        <h3>Antalya Beach Resort</h3>
                        <p>Luxury beachfront resort with pristine Mediterranean coastline</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-swimming-pool"></i> Private Beach</span>
                            <span class="feature"><i class="fas fa-spa"></i> Spa & Wellness</span>
                            <span class="feature"><i class="fas fa-concierge-bell"></i> All Inclusive</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>756 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <!-- Bodrum -->
                <div class="destination-card" data-duration="8-14" data-budget="budget" data-type="beach">
                    <div class="destination-image">
                        <img src="{{ asset('images/Bodrum.webp') }}" alt="Bodrum">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.6</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">149</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 10 Days</span>
                        </div>
                        <h3>Bodrum Coastal Paradise</h3>
                        <p>Budget-friendly coastal getaway with crystal clear waters</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-umbrella-beach"></i> Beach Access</span>
                            <span class="feature"><i class="fas fa-ship"></i> Boat Tours</span>
                            <span class="feature"><i class="fas fa-cocktail"></i> Nightlife</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>1,234 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <!-- Pamukkale -->
                <div class="destination-card" data-duration="1-3" data-budget="budget" data-type="nature">
                    <div class="destination-image">
                        <img src="{{ asset('images/istanbul.webp') }}" alt="Pamukkale">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">89</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 2 Days</span>
                        </div>
                        <h3>Pamukkale Thermal Pools</h3>
                        <p>Natural thermal springs and stunning white terraces</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-thermometer-three-quarters"></i> Thermal Pools</span>
                            <span class="feature"><i class="fas fa-nature-people"></i> Natural Wonder</span>
                            <span class="feature"><i class="fas fa-camera"></i> Photography</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>892 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <!-- Ephesus -->
                <div class="destination-card" data-duration="1-3" data-budget="budget" data-type="cultural">
                    <div class="destination-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Ephesus">
                        <div class="destination-overlay">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.4</span>
                            </div>
                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount">79</span>
                                <span class="period">/person</span>
                            </div>
                        </div>
                    </div>
                    <div class="destination-content">
                        <div class="destination-meta">
                            <span class="country">Turkey</span>
                            <span class="duration"><i class="fas fa-clock"></i> 1 Day</span>
                        </div>
                        <h3>Ancient Ephesus</h3>
                        <p>Walk through one of the best preserved ancient cities in the world</p>
                        <div class="destination-features">
                            <span class="feature"><i class="fas fa-archway"></i> Ancient Ruins</span>
                            <span class="feature"><i class="fas fa-history"></i> Historical Sites</span>
                            <span class="feature"><i class="fas fa-camera"></i> Photography</span>
                        </div>
                        <div class="destination-footer">
                            <div class="booking-count">
                                <i class="fas fa-users"></i>
                                <span>654 booked this month</span>
                            </div>
                            <a href={{ route('contact') }} class="btn-book">Enquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular This Month -->
    <section class="popular-this-month">
        <div class="container">
            <div class="section-header text-center">
                <h2>Popular This Month</h2>
                <p>Destinations trending among travelers right now</p>
            </div>

            <div class="trending-list">
                <div class="trending-item">
                    <div class="rank">1</div>
                    <div class="trending-image">
                        <img src="{{ asset('images/istanbul.webp') }}" alt="Istanbul">
                    </div>
                    <div class="trending-content">
                        <h4>Istanbul City Break</h4>
                        <p>Perfect weekend getaway</p>
                        <div class="trending-stats">
                            <span class="bookings">2,847 bookings</span>
                            <span class="rating">⭐ 4.9</span>
                        </div>
                    </div>
                    <div class="trending-price">
                        <span class="currency">$</span>
                        <span class="amount">299</span>
                    </div>
                </div>

                <div class="trending-item">
                    <div class="rank">2</div>
                    <div class="trending-image">
                        <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Cappadocia">
                    </div>
                    <div class="trending-content">
                        <h4>Cappadocia Adventure</h4>
                        <p>Balloon rides & cave hotels</p>
                        <div class="trending-stats">
                            <span class="bookings">1,923 bookings</span>
                            <span class="rating">⭐ 4.8</span>
                        </div>
                    </div>
                    <div class="trending-price">
                        <span class="currency">$</span>
                        <span class="amount">199</span>
                    </div>
                </div>

                <div class="trending-item">
                    <div class="rank">3</div>
                    <div class="trending-image">
                        <img src="{{ asset('images/Antalya.jpg') }}" alt="Antalya">
                    </div>
                    <div class="trending-content">
                        <h4>Antalya Beach Resort</h4>
                        <p>Luxury Mediterranean escape</p>
                        <div class="trending-stats">
                            <span class="bookings">756 bookings</span>
                            <span class="rating">⭐ 4.7</span>
                        </div>
                    </div>
                    <div class="trending-price">
                        <span class="currency">$</span>
                        <span class="amount">599</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="newsletter-cta">
        <div class="container">
            <div class="cta-content text-center">
                <h2>Never Miss a Great Deal</h2>
                <p>Get notified about trending destinations and exclusive offers</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn-subscribe">Get Deals</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/popular-destinations.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/user/popular-destinations.js') }}"></script>
@endpush
