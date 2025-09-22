@extends('user.layouts.app')
@section('title', 'Best Deals - Exclusive Turkey Travel Offers')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/best-deals.css') }}">
@endpush
@section('content')
    @php
        $breadcrumbs = [['title' => 'Best Deals', 'url' => '/best-deals']];
    @endphp

    @php
    $deals = [
        (object) [
            'id' => 1,
            'name' => 'Early Bird Istanbul Special',
            'subtitle' => 'Limited Time Offer',
            'description' => 'Book 60 days in advance and save up to 40% on our premium Istanbul cultural tour package.',
            'image' => 'https://images.unsplash.com/photo-1541961017774-22349e4a1262?w=800&q=80',
            'original_price' => '$599',
            'discounted_price' => '$359',
            'discount' => 40,
            'valid_until' => '2024-12-31',
            'category' => 'Early Bird',
            'duration' => '5 Days',
            'rating' => 4.9,
            'highlights' => ['Hagia Sophia', 'Blue Mosque', 'Grand Bazaar'],
            'featured' => true,
            'spots_left' => 8,
            'booked_count' => 47,
        ],
        (object) [
            'id' => 2,
            'name' => 'Last Minute Cappadocia',
            'subtitle' => 'Flash Sale - Book Now!',
            'description' => 'Amazing last-minute deal for Cappadocia balloon adventure. Departures available this week only.',
            'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
            'original_price' => '$399',
            'discounted_price' => '$199',
            'discount' => 50,
            'valid_until' => '2024-10-15',
            'category' => 'Last Minute',
            'duration' => '3 Days',
            'rating' => 4.8,
            'highlights' => ['Hot Air Balloon', 'Cave Hotels', 'Underground Cities'],
            'featured' => true,
            'spots_left' => 3,
            'booked_count' => 12,
        ],
        (object) [
            'id' => 3,
            'name' => 'Winter Antalya Beach Escape',
            'subtitle' => 'Seasonal Special',
            'description' => 'Escape the cold with our winter beach package in Antalya. All-inclusive luxury resort with spa treatments.',
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&q=80',
            'original_price' => '$899',
            'discounted_price' => '$629',
            'discount' => 30,
            'valid_until' => '2024-11-30',
            'category' => 'Seasonal',
            'duration' => '7 Days',
            'rating' => 4.7,
            'highlights' => ['Private Beach', 'All-Inclusive', 'Spa Package'],
            'featured' => false,
            'spots_left' => 15,
            'booked_count' => 23,
        ],
        (object) [
            'id' => 4,
            'name' => 'Family Adventure Package',
            'subtitle' => 'Kids Go Free!',
            'description' => 'Perfect family holiday with activities for all ages. Children under 12 stay and eat free.',
            'image' => 'https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?w=800&q=80',
            'original_price' => '$1299',
            'discounted_price' => '$999',
            'discount' => 23,
            'valid_until' => '2024-12-15',
            'category' => 'Family',
            'duration' => '6 Days',
            'rating' => 4.6,
            'highlights' => ['Family Activities', 'Kids Club', 'Free Meals'],
            'featured' => false,
            'spots_left' => 12,
            'booked_count' => 18,
        ],
        (object) [
            'id' => 5,
            'name' => 'Luxury Honeymoon Suite',
            'subtitle' => 'Romantic Getaway',
            'description' => 'Celebrate your love with our exclusive honeymoon package including champagne, flowers, and couples spa.',
            'image' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&q=80',
            'original_price' => '$1599',
            'discounted_price' => '$1199',
            'discount' => 25,
            'valid_until' => '2024-12-31',
            'category' => 'Romance',
            'duration' => '5 Days',
            'rating' => 4.9,
            'highlights' => ['Ocean View Suite', 'Champagne Breakfast', 'Couples Massage'],
            'featured' => true,
            'spots_left' => 6,
            'booked_count' => 9,
        ],
        (object) [
            'id' => 6,
            'name' => 'Budget Explorer Package',
            'subtitle' => 'Affordable Turkey Adventure',
            'description' => 'Experience the best of Turkey on a budget. Comfortable accommodations and guided tours included.',
            'image' => 'https://images.unsplash.com/photo-1524231757912-21f4fe3a7200?w=800&q=80',
            'original_price' => '$449',
            'discounted_price' => '$299',
            'discount' => 33,
            'valid_until' => '2024-11-15',
            'category' => 'Budget',
            'duration' => '4 Days',
            'rating' => 4.4,
            'highlights' => ['Budget Hotels', 'Local Transport', 'Street Food'],
            'featured' => false,
            'spots_left' => 20,
            'booked_count' => 31,
        ],
    ];

    $categories = ['All', 'Early Bird', 'Last Minute', 'Seasonal', 'Family', 'Romance', 'Budget'];
    $discountRanges = ['All', '20-30%', '30-40%', '40-50%', '50%+'];
    @endphp

    <!-- Hero Section -->
    <section class="deals-hero" style="background-image: url('{{ asset('images/Untitled.png') }}');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Best Deals & Exclusive Offers</h1>
                    <p class="hero-subtitle">Discover amazing savings on premium Turkey travel experiences. Limited time offers!</p>

                    <!-- Savings Stats -->
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">Up to 50%</span>
                            <span class="stat-label">Savings</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ count($deals) }}</span>
                            <span class="stat-label">Active Deals</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ array_sum(array_column($deals, 'booked_count')) }}</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                    </div>

                    <!-- Urgency Banner -->
                    <div class="urgency-banner">
                        <i class="fas fa-clock"></i>
                        <span>Limited spots available! Book now before deals expire</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal Categories -->
    <section class="deal-categories">
        <div class="container">
            <div class="categories-wrapper">
                @foreach($categories as $category)
                    <button class="category-btn {{ $loop->first ? 'active' : '' }}"
                            data-category="{{ strtolower(str_replace(' ', '-', $category)) }}">
                        {{ $category }}
                        @if($category !== 'All')
                            <span class="deal-count">
                                {{ collect($deals)->where('category', $category)->count() }}
                            </span>
                        @else
                            <span class="deal-count">{{ count($deals) }}</span>
                        @endif
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Deals -->
    <section class="featured-deals">
        <div class="container">
            <div class="section-header text-center">
                <h2>🔥 Hot Deals Right Now</h2>
                <p>Don't miss these incredible limited-time offers</p>
            </div>

            <div class="deals-grid">
                @foreach ($deals as $index => $deal)
                    <div class="deal-card {{ $deal->featured ? 'featured' : '' }}"
                         data-category="{{ strtolower(str_replace(' ', '-', $deal->category)) }}"
                         data-discount="{{ $deal->discount }}"
                         data-price="{{ str_replace('$', '', $deal->discounted_price) }}"
                         data-aos="fade-up"
                         data-aos-delay="{{ $index * 100 }}">

                        @if ($deal->featured)
                            <div class="featured-badge">
                                <i class="fas fa-fire"></i>
                                HOT DEAL
                            </div>
                        @endif

                        <!-- Urgency Indicators -->
                        <div class="urgency-indicators">
                            @if ($deal->spots_left <= 10)
                                <div class="spots-left">
                                    <i class="fas fa-exclamation-circle"></i>
                                    Only {{ $deal->spots_left }} spots left!
                                </div>
                            @endif

                            <div class="discount-badge">
                                <span class="discount-percent">{{ $deal->discount }}%</span>
                                <span class="discount-text">OFF</span>
                            </div>
                        </div>

                        <div class="deal-image">
                            <img src="{{ $deal->image }}" alt="{{ $deal->name }}">
                            <div class="deal-category">{{ $deal->category }}</div>
                        </div>

                        <div class="deal-content">
                            <div class="deal-header">
                                <h3 class="deal-name">{{ $deal->name }}</h3>
                                <p class="deal-subtitle">{{ $deal->subtitle }}</p>
                            </div>

                            <div class="deal-pricing">
                                <div class="price-comparison">
                                    <span class="original-price">${{ str_replace('$', '', $deal->original_price) }}</span>
                                    <span class="discounted-price">${{ str_replace('$', '', $deal->discounted_price) }}</span>
                                </div>
                                <div class="savings">
                                    You Save: ${{ str_replace('$', '', $deal->original_price) - str_replace('$', '', $deal->discounted_price) }}
                                </div>
                            </div>

                            <p class="deal-description">{{ $deal->description }}</p>

                            <div class="deal-meta">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <span>{{ $deal->rating }}</span>
                                </div>
                                <div class="duration">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $deal->duration }}</span>
                                </div>
                                <div class="booked-count">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $deal->booked_count }} booked</span>
                                </div>
                            </div>

                            <div class="deal-highlights">
                                @foreach (array_slice($deal->highlights, 0, 2) as $highlight)
                                    <span class="highlight-tag">{{ $highlight }}</span>
                                @endforeach
                            </div>

                            <div class="deal-footer">
                                <div class="countdown" data-date="{{ $deal->valid_until }}">
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="days-{{ $deal->id }}">00</span>
                                        <span class="countdown-label">Days</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="hours-{{ $deal->id }}">00</span>
                                        <span class="countdown-label">Hours</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span class="countdown-number" id="minutes-{{ $deal->id }}">00</span>
                                        <span class="countdown-label">Minutes</span>
                                    </div>
                                </div>

                                <a href="#" class="btn-book-deal">
                                    <span>Book Now</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Deal Filters -->
    <section class="deal-filters">
        <div class="container">
            <div class="filters-wrapper">
                <div class="filter-group">
                    <label>Discount Range</label>
                    <select class="filter-select" id="discountFilter">
                        <option value="all">Any Discount</option>
                        @foreach($discountRanges as $range)
                            <option value="{{ $range }}">{{ $range }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label>Duration</label>
                    <select class="filter-select" id="durationFilter">
                        <option value="all">Any Duration</option>
                        <option value="1-3">1-3 Days</option>
                        <option value="4-7">4-7 Days</option>
                        <option value="7+">7+ Days</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Price Range</label>
                    <select class="filter-select" id="priceFilter">
                        <option value="all">Any Price</option>
                        <option value="0-300">Under $300</option>
                        <option value="300-600">$300 - $600</option>
                        <option value="600-1000">$600 - $1000</option>
                        <option value="1000+">$1000+</option>
                    </select>
                </div>

                <button class="btn-reset" id="resetFilters">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
    </section>

    <!-- Why Book With Us -->
    <section class="why-book">
        <div class="container">
            <div class="section-header text-center">
                <h2>Why Book Your Deals With Us?</h2>
                <p>Trusted by thousands of travelers worldwide</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Best Price Guarantee</h4>
                        <p>Find a better price elsewhere? We'll match it and give you an extra 5% off</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h4>Free Cancellation</h4>
                        <p>Cancel up to 48 hours before departure for a full refund</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>Round-the-clock assistance from our expert customer service team</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center">
                        <div class="benefit-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>Exclusive Perks</h4>
                        <p>Free upgrades, welcome gifts, and special amenities included</p>
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
                <p>Get notified about exclusive offers and flash sales before anyone else</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn-subscribe">Get Deal Alerts</button>
                </form>
                <p class="cta-disclaimer">No spam, unsubscribe anytime. We respect your privacy.</p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('js/user/best-deals.js') }}"></script>
@endpush
