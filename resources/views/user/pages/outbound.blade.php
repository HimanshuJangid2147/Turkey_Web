@extends('user.layouts.app')
@section('title', 'Outbound Tours')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/outbound.css') }}">
@endpush
@section('content')
    @php
        $breadcrumbs = [['title' => 'Outbound Tours', 'url' => '/outbound']];
    @endphp

    @php
    $destinations = [
        (object) [
            'id' => 1,
            'name' => 'Paris',
            'subtitle' => 'City of Light',
            'description' =>
                'Discover the romance and elegance of Paris with visits to iconic landmarks and world-class museums.',
            'image' => 'https://images.unsplash.com/photo-1549144511-f099e773c147?w=800&q=80',
            'category' => 'Cultural',
            'duration' => '5 Days',
            'price' => '$899',
            'rating' => 4.9,
            'highlights' => ['Eiffel Tower', 'Louvre Museum', 'Notre Dame'],
            'featured' => true,
        ],
        (object) [
            'id' => 2,
            'name' => 'Dubai',
            'subtitle' => 'Modern Arabian Marvel',
            'description' => 'Experience luxury and adventure in the dazzling city of Dubai with desert safaris and modern attractions.',
            'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800&q=80',
            'category' => 'Luxury',
            'duration' => '4 Days',
            'price' => '$1299',
            'rating' => 4.8,
            'highlights' => ['Burj Khalifa', 'Desert Safari', 'Dubai Mall'],
            'featured' => true,
        ],
        (object) [
            'id' => 3,
            'name' => 'Bali',
            'subtitle' => 'Island of Gods',
            'description' => 'Relax in tropical paradise with beautiful beaches, ancient temples, and lush rice terraces.',
            'image' => 'https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?w=800&q=80',
            'category' => 'Beach',
            'duration' => '6 Days',
            'price' => '$759',
            'rating' => 4.7,
            'highlights' => ['Uluwatu Temple', 'Rice Terraces', 'Beach Clubs'],
            'featured' => false,
        ],
        (object) [
            'id' => 4,
            'name' => 'Tokyo',
            'subtitle' => 'Land of Rising Sun',
            'description' => 'Immerse yourself in Japanese culture, from ancient traditions to cutting-edge technology.',
            'image' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=800&q=80',
            'category' => 'Cultural',
            'duration' => '7 Days',
            'price' => '$1199',
            'rating' => 4.8,
            'highlights' => ['Mount Fuji', 'Shibuya Crossing', 'Traditional Temples'],
            'featured' => false,
        ],
        (object) [
            'id' => 5,
            'name' => 'Swiss Alps',
            'subtitle' => 'Alpine Adventure',
            'description' => 'Experience breathtaking mountain scenery, charming villages, and world-class skiing.',
            'image' => 'https://images.unsplash.com/photo-1531366936337-7c912a4589a7?w=800&q=80',
            'category' => 'Adventure',
            'duration' => '5 Days',
            'price' => '$1399',
            'rating' => 4.9,
            'highlights' => ['Matterhorn', 'Jungfraujoch', 'Lake Geneva'],
            'featured' => false,
        ],
        (object) [
            'id' => 6,
            'name' => 'Santorini',
            'subtitle' => 'Greek Island Paradise',
            'description' => 'Witness spectacular sunsets and explore whitewashed villages overlooking the Aegean Sea.',
            'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=800&q=80',
            'category' => 'Beach',
            'duration' => '4 Days',
            'price' => '$679',
            'rating' => 4.7,
            'highlights' => ['Oia Sunset', 'Blue Domes', 'Wine Tasting'],
            'featured' => false,
        ],
        (object) [
            'id' => 7,
            'name' => 'New York',
            'subtitle' => 'The Big Apple',
            'description' => 'Explore the vibrant energy of NYC with Broadway shows, world-famous landmarks, and diverse neighborhoods.',
            'image' => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800&q=80',
            'category' => 'Urban',
            'duration' => '5 Days',
            'price' => '$1099',
            'rating' => 4.6,
            'highlights' => ['Statue of Liberty', 'Central Park', 'Times Square'],
            'featured' => false,
        ],
        (object) [
            'id' => 8,
            'name' => 'Maldives',
            'subtitle' => 'Tropical Paradise',
            'description' => 'Escape to overwater bungalows and pristine beaches in this ultimate tropical getaway.',
            'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
            'category' => 'Beach',
            'duration' => '6 Days',
            'price' => '$1899',
            'rating' => 4.9,
            'highlights' => ['Overwater Villas', 'Coral Reefs', 'Spa Treatments'],
            'featured' => true,
        ],
        (object) [
            'id' => 9,
            'name' => 'Iceland',
            'subtitle' => 'Land of Fire and Ice',
            'description' => 'Witness the Northern Lights, explore glaciers, and soak in geothermal hot springs.',
            'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
            'category' => 'Adventure',
            'duration' => '6 Days',
            'price' => '$1199',
            'rating' => 4.8,
            'highlights' => ['Northern Lights', 'Blue Lagoon', 'Geysers'],
            'featured' => false,
        ],
        (object) [
            'id' => 10,
            'name' => 'Thailand',
            'subtitle' => 'Land of Smiles',
            'description' => 'Experience exotic temples, delicious street food, and stunning tropical islands.',
            'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
            'category' => 'Cultural',
            'duration' => '8 Days',
            'price' => '$849',
            'rating' => 4.6,
            'highlights' => ['Grand Palace', 'Floating Markets', 'Phi Phi Islands'],
            'featured' => false,
        ],
    ];

    $categories = ['All', 'Cultural', 'Luxury', 'Beach', 'Adventure', 'Urban'];
    $durations = ['All', '4 Days', '5 Days', '6 Days', '7 Days', '8 Days'];
@endphp

    <section class="outbound-hero" style="background-image: url('{{ asset('images/Untitled.png') }}');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Outbound Tours</h1>
                    <p class="hero-subtitle">Discover the world of Turkey with our exceptional outbound tours.</p>
                    {{-- search bar --}}
                    <div class="hero-search">
                        <div class="search-wrapper">
                            <i class="fa fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Search destinations..."
                                id="searchInput">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="outbound-grid">
        <div class="container">
            <div class="row g-4" id="outboundContainer">
                @foreach ($destinations as $index => $destination)
                    <div class="col-lg-4 col-md-6 destination-item" data-category="{{ $destination->category }}"
                        data-duration="{{ $destination->duration }}"
                        data-price="{{ str_replace('$', '', $destination->price) }}"
                        data-rating="{{ $destination->rating }}" data-name="{{ $destination->name }}"
                        data-featured="{{ $destination->featured ? '1' : '0' }}">

                        <div class="outbound-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            @if ($destination->featured)
                                <div class="featured-badge">
                                    <i class="fas fa-star"></i>
                                    Featured
                                </div>
                            @endif

                            <div class="card-image-wrapper">
                                <img src="{{ asset($destination->image) }}" class="destination-image"
                                    alt="{{ $destination->name }}">
                                <div class="image-overlay"></div>

                                <!-- Center Bar -->
                                <div class="center-bar">
                                    <span><i class="fa-solid fa-location-dot"></i>{{ $destination->name }}</span>
                                    <i class="fa-solid fa-grip-lines-vertical"></i>
                                    {{ $destination->duration }}
                                    <i class="fa-solid fa-grip-lines-vertical"></i>
                                    <span>{{ $destination->price }}</span>
                                </div>

                                <!-- Category Badge -->
                                <div class="category-badge">{{ $destination->category }}</div>

                                <!-- Wishlist Button -->
                                <button class="wishlist-btn" data-id="{{ $destination->id }}">
                                    <i class="far fa-heart"></i>
                                </button>

                                <div class="outbound-header">
                                    <h3 class="outbound-name">{{ $destination->name }}</h3>
                                    <p class="outbound-subtitle">{{ $destination->subtitle }}</p>
                                </div>
                            </div>

                            <div class="outbound-info">
                                <div class="info-row">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <span>{{ $destination->rating }}</span>
                                    </div>
                                    <div class="duration">
                                        <i class="far fa-clock"></i>
                                        <span>{{ $destination->duration }}</span>
                                    </div>
                                </div>

                                <p class="outbound-description">{{ $destination->description }}</p>

                                <div class="highlights">
                                    @foreach (array_slice($destination->highlights, 0, 2) as $highlight)
                                        <span class="highlight-tag">{{ $highlight }}</span>
                                    @endforeach
                                    @if (count($destination->highlights) > 2)
                                        <span class="highlight-more">+{{ count($destination->highlights) - 2 }} more</span>
                                    @endif
                                </div>

                                <div class="card-footer">
                                    <div class="price">
                                        <span class="price-label">From</span>
                                        <span class="price-value">{{ $destination->price }}</span>
                                        <span class="price-unit">per person</span>
                                    </div>
                                    <div class="card-actions">
                                        <a href="#" class="btn-primary-custom">
                                            <span>View Details</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="#" class="btn-enquire">
                                            <span>Enquire Now</span>
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="no-results" style="display: none;">
                <div class="no-results-content">
                    <i class="fas fa-search"></i>
                    <h3>No destinations found</h3>
                    <p>Try adjusting your filters or search terms</p>
                    <button class="btn-clear-filters" onclick="clearAllFilters()">Clear All Filters</button>
                </div>
            </div>
        </div>
    </section>
@endsection
