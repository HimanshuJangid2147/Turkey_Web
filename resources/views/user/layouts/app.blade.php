<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turkey Travel Website</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/sitecolor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/aboutus.css') }}">

    {{-- Custom CSS for gradient background --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/user_css/graident.css') }}"> --}}
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <header>
        @include('user.partials.navbar')
    </header>
    <main class="flex-grow-1">
        @yield('content')
    </main>
    <footer>
        @include('user.partials.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize carousel with enhanced settings
            const carouselElement = document.getElementById('heroCarousel');
            const heroCarousel = new bootstrap.Carousel(carouselElement, {
                interval: 6000,
                wrap: true,
                touch: true,
                keyboard: true
            });

            // Enhanced indicator functionality
            const indicators = document.querySelectorAll('.carousel-indicators button');
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove active class from all indicators
                    indicators.forEach(ind => ind.classList.remove('active'));

                    // Add active class to clicked indicator
                    this.classList.add('active');

                    // Navigate to the slide
                    heroCarousel.to(index);
                });
            });

            // Update indicators on slide change
            carouselElement.addEventListener('slide.bs.carousel', function(e) {
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === e.to);
                });
            });

            // Pause on hover for better UX
            carouselElement.addEventListener('mouseenter', () => {
                heroCarousel.pause();
            });

            carouselElement.addEventListener('mouseleave', () => {
                heroCarousel.cycle();
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    heroCarousel.prev();
                } else if (e.key === 'ArrowRight') {
                    heroCarousel.next();
                }
            });
        });
    </script>
</body>

</html>
