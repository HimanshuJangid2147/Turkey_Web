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
                'name' => 'Istanbul',
                'subtitle' => 'Historical Heart',
                'description' =>
                    'Experience the rich history and vibrant culture of Istanbul with this exclusive inbound tour package.',
                'image' => 'images/Istanbul-Sightseeing.jpg',
                'category' => 'Historical',
                'duration' => '4 Days',
                'price' => '$299',
                'rating' => 4.8,
                'highlights' => ['Hagia Sophia', 'Blue Mosque', 'Grand Bazaar'],
                'featured' => true,
            ],
            (object) [
                'id' => 2,
                'name' => 'Cappadocia',
                'subtitle' => 'Fairy Tale Landscapes',
                'description' => 'Explore the unique landscapes and hot air balloon rides in Cappadocia.',
                'image' => 'images/Cappadocia.jpg',
                'category' => 'Adventure',
                'duration' => '3 Days',
                'price' => '$459',
                'rating' => 4.9,
                'highlights' => ['Hot Air Balloons', 'Underground Cities', 'Rock Formations'],
                'featured' => true,
            ],
            (object) [
                'id' => 3,
                'name' => 'Bodrum',
                'subtitle' => 'Turkish Riviera Paradise',
                'description' => 'Relax on the beautiful beaches and enjoy the Mediterranean climate.',
                'image' => 'images/Bodrum.webp',
                'category' => 'Beach',
                'duration' => '5 Days',
                'price' => '$379',
                'rating' => 4.7,
                'highlights' => ['Azure Waters', 'Ancient Ruins', 'Marina Life'],
                'featured' => false,
            ],
            (object) [
                'id' => 4,
                'name' => 'Antalya',
                'subtitle' => 'Gateway to the Mediterranean',
                'description' => 'Discover ancient ruins, stunning coastlines, and vibrant city life.',
                'image' => 'images/antalya.jpg',
                'category' => 'Beach',
                'duration' => '4 Days',
                'price' => '$329',
                'rating' => 4.6,
                'highlights' => ['Ancient Theater', 'Waterfalls', 'Old Town'],
                'featured' => false,
            ],
            (object) [
                'id' => 5,
                'name' => 'Pamukkale',
                'subtitle' => 'Cotton Castle Wonder',
                'description' => 'Marvel at the white travertine terraces and ancient thermal pools.',
                'image' => 'images/pamukkale.jpg',
                'category' => 'Nature',
                'duration' => '2 Days',
                'price' => '$199',
                'rating' => 4.5,
                'highlights' => ['Thermal Pools', 'Hierapolis', 'White Terraces'],
                'featured' => false,
            ],
            (object) [
                'id' => 6,
                'name' => 'Ephesus',
                'subtitle' => 'Ancient Roman Glory',
                'description' => 'Walk through one of the best-preserved ancient cities in the world.',
                'image' => 'images/ephesus.jpg',
                'category' => 'Historical',
                'duration' => '1 Day',
                'price' => '$129',
                'rating' => 4.7,
                'highlights' => ['Library of Celsus', 'Great Theatre', 'Temple of Artemis'],
                'featured' => false,
            ],
            (object) [
                'id' => 7,
                'name' => 'Trabzon',
                'subtitle' => 'Black Sea Pearl',
                'description' => 'Discover the lush landscapes and monasteries of Turkey\'s Black Sea region.',
                'image' => 'images/trabzon.jpg',
                'category' => 'Nature',
                'duration' => '3 Days',
                'price' => '$249',
                'rating' => 4.4,
                'highlights' => ['Sumela Monastery', 'Uzungöl Lake', 'Tea Plantations'],
                'featured' => false,
            ],
            (object) [
                'id' => 8,
                'name' => 'Troy',
                'subtitle' => 'Legendary Ancient City',
                'description' => 'Explore the legendary city of Troy and its fascinating archaeological sites.',
                'image' => 'images/troy.jpg',
                'category' => 'Historical',
                'duration' => '1 Day',
                'price' => '$99',
                'rating' => 4.3,
                'highlights' => ['Trojan Horse', 'Ancient Walls', 'Archaeological Museum'],
                'featured' => false,
            ],
        ];

        $categories = ['All', 'Historical', 'Adventure', 'Beach', 'Nature'];
        $durations = ['All', '1 Day', '2 Days', '3 Days', '4 Days', '5 Days'];
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
