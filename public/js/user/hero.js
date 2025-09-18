document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe all fade-in-up elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
        observer.observe(el);
    });

    // Enhanced carousel functionality
    const carousel = document.getElementById('heroCarousel');
    if (carousel) {
        const bsCarousel = new bootstrap.Carousel(carousel, {
            interval: 8000,
            wrap: true,
            touch: true,
            keyboard: true
        });

        // Pause on hover
        carousel.addEventListener('mouseenter', () => bsCarousel.pause());
        carousel.addEventListener('mouseleave', () => bsCarousel.cycle());

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') bsCarousel.prev();
            if (e.key === 'ArrowRight') bsCarousel.next();
        });
    }

    // Newsletter form enhancement
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('.newsletter-btn');
            const input = this.querySelector('.newsletter-input');

            // Add loading state
            btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Subscribing...';
            btn.disabled = true;

            // Simulate subscription
            setTimeout(() => {
                btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Subscribed!';
                btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                input.value = '';

                setTimeout(() => {
                    btn.innerHTML = '<i class="bi bi-send-fill me-2"></i>Subscribe Now';
                    btn.style.background = '';
                    btn.disabled = false;
                }, 3000);
            }, 2000);
        });
    }

    // Enhanced hover effects for cards
    document.querySelectorAll('.destination-card, .deals-card, .testimonial-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = this.classList.contains('destination-card')
                ? 'translateY(-15px) scale(1.03)'
                : 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Instagram posts click handler
    document.querySelectorAll('.instagram-post').forEach(post => {
        post.addEventListener('click', function() {
            // Simulate opening Instagram post
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            }, 150);
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
