// Destination Categories Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeCategoryFilters();
    initializeAnimations();
    initializeNewsletterForm();
});

// Category Filter Functionality
function initializeCategoryFilters() {
    const filterTags = document.querySelectorAll('.filter-tag');
    const categoryCards = document.querySelectorAll('.category-card');

    filterTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');

            // Update active tag
            filterTags.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Filter categories
            filterCategories(categoryCards, filterValue);
        });
    });
}

function filterCategories(cards, filter) {
    cards.forEach(card => {
        const category = card.getAttribute('data-category');

        if (filter === 'all' || category === filter) {
            card.style.display = 'block';
            // Animate in
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        } else {
            // Animate out
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

// Initialize animations on scroll
function initializeAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe category cards
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
        observer.observe(card);
    });

    // Observe popular items
    const popularItems = document.querySelectorAll('.popular-item');
    popularItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
        observer.observe(item);
    });
}

// Newsletter form handling
function initializeNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = this.querySelector('input[type="email"]').value;
            const submitBtn = this.querySelector('.btn-subscribe');

            // Simulate form submission
            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;

            setTimeout(() => {
                submitBtn.textContent = 'Subscribed!';
                submitBtn.style.background = '#28a745';

                setTimeout(() => {
                    submitBtn.textContent = 'Subscribe';
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                    this.reset();
                }, 2000);
            }, 1000);
        });
    }
}

// Smooth scroll for category buttons
function scrollToCategories() {
    const categoriesSection = document.querySelector('.categories-grid-section');
    if (categoriesSection) {
        categoriesSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Add click handlers for category buttons
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-category')) {
        e.preventDefault();
        // Here you would typically navigate to a filtered results page
        // For now, we'll just scroll to show the filtering in action
        scrollToCategories();
    }
});

// Add loading animation for images
function initializeImageLoading() {
    const categoryImages = document.querySelectorAll('.category-image img');

    categoryImages.forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });

        img.addEventListener('error', function() {
            this.src = '/images/placeholder.jpg'; // Fallback image
        });
    });
}

// Initialize image loading
initializeImageLoading();

// Add parallax effect to hero section
function initializeParallax() {
    const hero = document.querySelector('.categories-hero');

    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = hero.querySelector('.hero-overlay');
            const rate = scrolled * -0.5;

            if (parallax) {
                parallax.style.transform = `translateY(${rate}px)`;
            }
        });
    }
}

// Initialize parallax
initializeParallax();
