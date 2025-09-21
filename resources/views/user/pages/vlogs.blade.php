@extends('user.layouts.app')
@section('title', 'Vlogs & Events')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/vlogs.css') }}">
@endpush

@section('content')
    @php
        $breadcrumbs = [['title' => 'Vlogs & Events', 'url' => '/vlogs']];
    @endphp
    <section class="vlogs-hero" style="background-image: url({{ asset('images/Antalya.jpg') }});">
        <div class="vlogs-overlay">
            <div class="container text-center">
                <h1 class="vlogs-tagline">Explore Our Latest Vlogs & Events</h1>
            </div>
        </div>
    </section>

    <section class="featured-vlog container my-5">
        <h2>Featured Vlog</h2>
        <div class="featured-vlog-card">
            <video controls poster="{{ asset('images/featured-vlog-poster.jpg') }}">
                <source src="{{ asset('videos/featured-vlog.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="featured-vlog-info">
                <h3>Discover the Beauty of Turkey</h3>
                <p>Join us as we explore the stunning landscapes and rich culture of Turkey in this exclusive vlog.</p>
                <span class="duration">Duration: 12:34</span>
            </div>
        </div>
    </section>

    <section class="vlog-categories container my-5">
        <h2>Categories</h2>
        <div class="categories-tabs">
            <button class="category-tab active" data-category="all">All</button>
            <button class="category-tab" data-category="travel">Travel</button>
            <button class="category-tab" data-category="culture">Culture</button>
            <button class="category-tab" data-category="food">Food</button>
            <button class="category-tab" data-category="events">Events</button>
        </div>
    </section>

    <section class="vlog-grid container my-5">
        <div class="row" id="vlogGrid">
            <!-- Vlog cards will be dynamically inserted here -->
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const vlogs = [
            {
                id: 1,
                category: 'travel',
                title: 'Exploring Istanbul',
                description: 'A journey through the historic city of Istanbul.',
                duration: '10:20',
                thumbnail: '{{ asset("images/vlog1-thumbnail.jpg") }}',
                videoUrl: '{{ asset("videos/vlog1.mp4") }}'
            },
            {
                id: 2,
                category: 'culture',
                title: 'Turkish Traditions',
                description: 'An insight into Turkish cultural heritage.',
                duration: '8:45',
                thumbnail: '{{ asset("images/vlog2-thumbnail.jpg") }}',
                videoUrl: '{{ asset("videos/vlog2.mp4") }}'
            },
            {
                id: 3,
                category: 'food',
                title: 'Turkish Cuisine',
                description: 'Delicious Turkish dishes and recipes.',
                duration: '9:30',
                thumbnail: '{{ asset("images/vlog3-thumbnail.jpg") }}',
                videoUrl: '{{ asset("videos/vlog3.mp4") }}'
            },
            {
                id: 4,
                category: 'events',
                title: 'Istanbul Music Festival',
                description: 'Highlights from the annual music festival.',
                duration: '11:15',
                thumbnail: '{{ asset("images/vlog4-thumbnail.jpg") }}',
                videoUrl: '{{ asset("videos/vlog4.mp4") }}'
            }
        ];

        const vlogGrid = document.getElementById('vlogGrid');
        const categoryTabs = document.querySelectorAll('.category-tab');

        function renderVlogs(filterCategory = 'all') {
            vlogGrid.innerHTML = '';
            const filteredVlogs = filterCategory === 'all' ? vlogs : vlogs.filter(v => v.category === filterCategory);

            filteredVlogs.forEach(vlog => {
                const col = document.createElement('div');
                col.className = 'col-md-4 mb-4';

                col.innerHTML = `
                    <div class="vlog-card">
                        <video controls poster="${vlog.thumbnail}" class="vlog-thumbnail">
                            <source src="${vlog.videoUrl}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="vlog-info">
                            <h4>${vlog.title}</h4>
                            <p>${vlog.description}</p>
                            <span class="duration">Duration: ${vlog.duration}</span>
                        </div>
                    </div>
                `;

                vlogGrid.appendChild(col);
            });
        }

        categoryTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                categoryTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                renderVlogs(this.dataset.category);
            });
        });

        renderVlogs();
    });
</script>
@endpush
