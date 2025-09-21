/* Layout-Specific JavaScript - Navbar, Hero, Footer functionality */

/* ===== NAVBAR FUNCTIONALITY ===== */
const NavbarUtils = {
    init: () => {
        const navbar = document.getElementById('mainNavbar');
        const navLinks = document.querySelectorAll('.nav-link-enhanced');

        if (!navbar) return;

        let scrolled = false;

        // Throttled scroll handler for better performance
        const updateNavbar = CoreUtils.throttle(() => {
            if (window.scrollY > 50) {
                if (!scrolled) {
                    navbar.classList.add('scrolled');
                    scrolled = true;
                }
            } else {
                if (scrolled) {
                    navbar.classList.remove('scrolled');
                    scrolled = false;
                }
            }
        }, 16);

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();

        // Active page highlighting
        const currentPath = window.location.pathname;
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });

        // Mobile menu close on link click
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.getElementById('navbarSupportedContent');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });

        // Dropdown accessibility improvements
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!toggle.contains(e.target) && !toggle.nextElementSibling?.contains(e.target)) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });

            // Handle keyboard navigation
            toggle.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    toggle.setAttribute('aria-expanded', 'false');
                    toggle.blur();
                }
            });
        });
    }
};

/* ===== HERO SECTION FUNCTIONALITY ===== */
const HeroUtils = {
    init: () => {
        // Initialize animations
        IntersectionObserverUtils.animateOnScroll('.fade-in-up');

        // Initialize carousel
        const carousel = document.getElementById('heroCarousel');
        if (carousel) {
            CarouselUtils.init(carousel, { interval: 8000 });
        }

        // Newsletter form enhancement
        HeroUtils.initNewsletterForm();

        // Enhanced hover effects for cards
        HeroUtils.initCardEffects();

        // Instagram posts click handler
        HeroUtils.initInstagramHandler();

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                const carousel = document.getElementById('heroCarousel');
                if (carousel && document.activeElement.closest('#heroCarousel')) {
                    e.preventDefault();
                    const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                    if (bsCarousel) {
                        e.key === 'ArrowLeft' ? bsCarousel.prev() : bsCarousel.next();
                    }
                }
            }
        });
    },

    initNewsletterForm: () => {
        const newsletterForm = document.querySelector('.newsletter-form');
        if (!newsletterForm) return;

        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('.newsletter-btn');
            const input = this.querySelector('.newsletter-input');

            FormUtils.showLoading(btn, 'Subscribing...');

            setTimeout(() => {
                FormUtils.hideLoading(btn);
                btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Subscribed!';
                btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                input.value = '';

                setTimeout(() => {
                    btn.innerHTML = '<i class="bi bi-send-fill me-2"></i>Subscribe Now';
                    btn.style.background = '';
                }, 3000);

                NotificationSystem.show('Successfully subscribed to newsletter!', 'success');
            }, 2000);
        });
    },

    initCardEffects: () => {
        const cards = document.querySelectorAll('.destination-card, .deals-card, .testimonial-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = this.classList.contains('destination-card')
                    ? 'translateY(-15px) scale(1.03)'
                    : 'translateY(-10px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    },

    initInstagramHandler: () => {
        document.querySelectorAll('.instagram-post').forEach(post => {
            post.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                }, 150);
            });
        });
    }
};

/* ===== FOOTER FUNCTIONALITY ===== */
const FooterUtils = {
    init: () => {
        // Add any footer-specific functionality here
        // Currently footer is mostly static
    }
};

/* ===== INITIALIZE LAYOUT ===== */
CoreUtils.ready(() => {
    NavbarUtils.init();
    HeroUtils.init();
    FooterUtils.init();
});
