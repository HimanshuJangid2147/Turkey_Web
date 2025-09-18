document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel with enhanced settings
    const carouselElement = document.getElementById('heroCarousel');
    if (carouselElement) {
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
    }
});
