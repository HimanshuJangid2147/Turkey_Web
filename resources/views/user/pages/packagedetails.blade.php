@extends('user.layouts.app')
@section('title', 'Package Details - Istanbul Discovery Tour')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/packagedetails.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/user/packagedetails.js') }}"></script>
@endpush

@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'All Destinations', 'url' => '/destinations'],
            ['title' => 'Package Details', 'url' => '/packagedetails']
        ];

        // Sample package data - In real implementation, this would come from database/controller
        $package = (object) [
            'id' => 1,
            'name' => 'Istanbul Discovery Tour',
            'subtitle' => 'Historical Heart of Turkey',
            'description' => 'Experience the magical blend of East and West in Istanbul, where ancient history meets modern culture. This comprehensive tour takes you through the city\'s most iconic landmarks and hidden gems.',
            'duration' => '4 Days / 3 Nights',
            'price' => 299,
            'currency' => '$',
            'rating' => 4.8,
            'review_count' => 1247,
            'location' => 'Istanbul, Turkey',
            'difficulty' => 'Easy',
            'group_size' => '2-15 People',
            'main_image' => 'images/Istanbul-Sightseeing.jpg',
            'gallery' => [
                'images/istanbul.webp',
                'images/Cappadocia.jpg',
                'images/Bodrum.webp',
                'images/Antalya.jpg'
            ],
            'highlights' => [
                'Visit Hagia Sophia and Blue Mosque',
                'Explore Grand Bazaar and Spice Market',
                'Bosphorus Cruise Experience',
                'Topkapi Palace Guided Tour',
                'Traditional Turkish Cuisine Tasting'
            ],
            'itinerary' => [
                (object) [
                    'day' => 1,
                    'title' => 'Arrival & Istanbul Overview',
                    'description' => 'Arrive in Istanbul, hotel check-in, welcome dinner, and city orientation walk.',
                    'meals' => 'Dinner',
                    'accommodation' => '4-star Hotel in Sultanahmet'
                ],
                (object) [
                    'day' => 2,
                    'title' => 'Historical Peninsula Tour',
                    'description' => 'Visit Hagia Sophia, Blue Mosque, Hippodrome, and Topkapi Palace with expert guide.',
                    'meals' => 'Breakfast, Lunch',
                    'accommodation' => '4-star Hotel in Sultanahmet'
                ],
                (object) [
                    'day' => 3,
                    'title' => 'Bosphorus & Markets',
                    'description' => 'Scenic Bosphorus cruise, Grand Bazaar, Spice Market, and traditional Turkish bath experience.',
                    'meals' => 'Breakfast, Lunch, Dinner',
                    'accommodation' => '4-star Hotel in Sultanahmet'
                ],
                (object) [
                    'day' => 4,
                    'title' => 'Departure Day',
                    'description' => 'Free morning for last-minute shopping, airport transfer, departure.',
                    'meals' => 'Breakfast',
                    'accommodation' => null
                ]
            ],
            'included' => [
                'Airport transfers',
                '3 nights hotel accommodation',
                'Professional English-speaking guide',
                'All entrance fees',
                'All meals as mentioned',
                'Bosphorus cruise ticket',
                'Travel insurance'
            ],
            'excluded' => [
                'International flights',
                'Visa fees',
                'Personal expenses',
                'Optional activities',
                'Gratuities'
            ],
            'reviews' => [
                (object) [
                    'name' => 'Sarah Johnson',
                    'rating' => 5,
                    'date' => '2 weeks ago',
                    'comment' => 'Absolutely amazing experience! The guide was knowledgeable and the itinerary was perfect.',
                    'avatar' => 'https://randomuser.me/api/portraits/women/1.jpg'
                ],
                (object) [
                    'name' => 'Michael Chen',
                    'rating' => 5,
                    'date' => '1 month ago',
                    'comment' => 'Best trip ever! Istanbul is magical and this tour captured all the highlights.',
                    'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'
                ],
                (object) [
                    'name' => 'Emma Wilson',
                    'rating' => 4,
                    'date' => '2 months ago',
                    'comment' => 'Great value for money. The Bosphorus cruise was the highlight of our trip.',
                    'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'
                ]
            ]
        ];
    @endphp

    <!-- Package Hero Section -->
    <section class="package-hero" style="background-image: url({{ asset($package->main_image) }});">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <div class="package-meta">
                            <span class="location-badge">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $package->location }}
                            </span>
                            <span class="difficulty-badge">{{ $package->difficulty }}</span>
                        </div>
                        <h1 class="hero-title">{{ $package->name }}</h1>
                        <p class="hero-subtitle">{{ $package->subtitle }}</p>

                        <div class="package-stats">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Duration</span>
                                    <span class="stat-value">{{ $package->duration }}</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Rating</span>
                                    <span class="stat-value">{{ $package->rating }} ({{ number_format($package->review_count) }} reviews)</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Group Size</span>
                                    <span class="stat-value">{{ $package->group_size }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="booking-card">
                        <div class="price-section">
                            <div class="price-main">
                                <span class="currency">{{ $package->currency }}</span>
                                <span class="amount">{{ number_format($package->price) }}</span>
                                <span class="period">per person</span>
                            </div>
                            <div class="price-note">Best Price Guarantee</div>
                        </div>

                        <div class="booking-form">
                            <div class="form-group">
                                <label>Departure Date</label>
                                <input type="date" class="form-control" id="departureDate">
                            </div>
                            <div class="form-group">
                                <label>Travelers</label>
                                <select class="form-control" id="travelers">
                                    <option value="1">1 Traveler</option>
                                    <option value="2">2 Travelers</option>
                                    <option value="3">3 Travelers</option>
                                    <option value="4">4 Travelers</option>
                                </select>
                            </div>
                            <button class="btn-book-now" id="bookNowBtn">
                                <span>Book Now</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>

                        <div class="booking-features">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Free Cancellation</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-headset"></i>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Package Overview Section -->
    <section class="package-overview">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="overview-content">
                        <h2>About This Package</h2>
                        <p class="lead">{{ $package->description }}</p>

                        <h3>Package Highlights</h3>
                        <div class="highlights-grid">
                            @foreach($package->highlights as $highlight)
                                <div class="highlight-item">
                                    <i class="fas fa-check"></i>
                                    <span>{{ $highlight }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-info-card">
                        <h4>Package Information</h4>
                        <div class="info-list">
                            <div class="info-item">
                                <span class="label">Duration:</span>
                                <span class="value">{{ $package->duration }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Location:</span>
                                <span class="value">{{ $package->location }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Difficulty:</span>
                                <span class="value">{{ $package->difficulty }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Group Size:</span>
                                <span class="value">{{ $package->group_size }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Itinerary Section -->
    <section class="itinerary-section">
        <div class="container">
            <div class="section-header">
                <h2>Trip Itinerary</h2>
                <p>Day by day breakdown of your adventure</p>
            </div>

            <div class="itinerary-timeline">
                @foreach($package->itinerary as $index => $day)
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <span class="day-number">Day {{ $day->day }}</span>
                        </div>
                        <div class="timeline-content">
                            <h4>{{ $day->title }}</h4>
                            <p>{{ $day->description }}</p>
                            <div class="day-details">
                                @if($day->meals)
                                    <span class="detail-item">
                                        <i class="fas fa-utensils"></i>
                                        {{ $day->meals }}
                                    </span>
                                @endif
                                @if($day->accommodation)
                                    <span class="detail-item">
                                        <i class="fas fa-bed"></i>
                                        {{ $day->accommodation }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="section-header">
                <h2>Photo Gallery</h2>
                <p>Explore the beauty of this destination</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-main">
                    <img src="{{ asset($package->main_image) }}" alt="Main gallery image" class="gallery-image">
                    <div class="gallery-overlay">
                        <button class="btn-view-gallery" onclick="openGallery(0)">
                            <i class="fas fa-expand"></i>
                            View Gallery
                        </button>
                    </div>
                </div>
                <div class="gallery-thumbnails">
                    @foreach($package->gallery as $index => $image)
                        <div class="thumbnail-item" onclick="openGallery({{ $index + 1 }})">
                            <img src="{{ asset($image) }}" alt="Gallery image {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Inclusions/Exclusions Section -->
    <section class="inclusions-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="inclusions-card">
                        <h3><i class="fas fa-check-circle"></i> What's Included</h3>
                        <ul class="inclusions-list">
                            @foreach($package->included as $item)
                                <li><i class="fas fa-check"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="exclusions-card">
                        <h3><i class="fas fa-times-circle"></i> What's Excluded</h3>
                        <ul class="exclusions-list">
                            @foreach($package->excluded as $item)
                                <li><i class="fas fa-times"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section">
        <div class="container">
            <div class="section-header">
                <h2>Customer Reviews</h2>
                <div class="rating-overview">
                    <div class="overall-rating">
                        <span class="rating-score">{{ $package->rating }}</span>
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $package->rating ? 'filled' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="review-count">Based on {{ number_format($package->review_count) }} reviews</span>
                    </div>
                </div>
            </div>

            <div class="reviews-grid">
                @foreach($package->reviews as $review)
                    <div class="review-card">
                        <div class="review-header">
                            <img src="{{ $review->avatar }}" alt="{{ $review->name }}" class="reviewer-avatar">
                            <div class="reviewer-info">
                                <h5>{{ $review->name }}</h5>
                                <span class="review-date">{{ $review->date }}</span>
                            </div>
                            <div class="review-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? 'filled' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="review-comment">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button class="btn-load-more">Load More Reviews</button>
            </div>
        </div>
    </section>

    <!-- Related Packages Section -->
    <section class="related-packages">
        <div class="container">
            <div class="section-header">
                <h2>You Might Also Like</h2>
                <p>Similar packages that other travelers loved</p>
            </div>

            <div class="related-grid">
                <div class="related-card">
                    <img src="{{ asset('images/Cappadocia.jpg') }}" alt="Cappadocia" class="related-image">
                    <div class="related-content">
                        <h4>Cappadocia Adventure</h4>
                        <p class="related-location">Cappadocia, Turkey</p>
                        <div class="related-footer">
                            <span class="related-price">$459</span>
                            <button class="btn-view-details">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="related-card">
                    <img src="{{ asset('images/Bodrum.webp') }}" alt="Bodrum" class="related-image">
                    <div class="related-content">
                        <h4>Bodrum Beach Paradise</h4>
                        <p class="related-location">Bodrum, Turkey</p>
                        <div class="related-footer">
                            <span class="related-price">$379</span>
                            <button class="btn-view-details">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="related-card">
                    <img src="{{ asset('images/Antalya.jpg') }}" alt="Antalya" class="related-image">
                    <div class="related-content">
                        <h4>Antalya Mediterranean</h4>
                        <p class="related-location">Antalya, Turkey</p>
                        <div class="related-footer">
                            <span class="related-price">$329</span>
                            <button class="btn-view-details">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="gallery-modal">
        <div class="modal-content">
            <button class="close-modal" onclick="closeGallery()">&times;</button>
            <button class="nav-btn prev-btn" onclick="previousImage()">&#10094;</button>
            <button class="nav-btn next-btn" onclick="nextImage()">&#10095;</button>
            <img id="modalImage" src="" alt="Gallery image">
        </div>
    </div>
@endsection
