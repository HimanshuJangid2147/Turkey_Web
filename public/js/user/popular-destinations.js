// Popular Destinations Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeFilters();
    initializeAnimations();
    initializeNewsletterForm();
    initializeBookingButtons();
});

// Filter Functionality
function initializeFilters() {
    const durationFilter = document.getElementById('durationFilter');
    const budgetFilter = document.getElementById('budgetFilter');
    const typeFilter = document.getElementById('typeFilter');
    const resetBtn = document.getElementById('resetFilters');
    const destinationCards = document.querySelectorAll('.destination-card');

    // Add event listeners to filters
    [durationFilter, budgetFilter, typeFilter].forEach(filter => {
        filter.addEventListener('change', function() {
            applyFilters(destinationCards);
        });
    });

    // Reset filters
    resetBtn.addEventListener('click', function() {
        durationFilter.value = 'all';
        budgetFilter.value = 'all';
        typeFilter.value = 'all';
        applyFilters(destinationCards);
    });
}

function applyFilters(cards) {
    const durationValue = document.getElementById('durationFilter').value;
    const budgetValue = document.getElementById('budgetFilter').value;
    const typeValue = document.getElementById('typeFilter').value;

    let visibleCount = 0;

    cards.forEach(card => {
        const duration = card.getAttribute('data-duration');
        const budget = card.getAttribute('data-budget');
        const type = card.getAttribute('data-type');

        const durationMatch = durationValue === 'all' || duration === durationValue;
        const budgetMatch = budgetValue === 'all' || budget === budgetValue;
        const typeMatch = typeValue === 'all' || type === typeValue;

        if (durationMatch && budgetMatch && typeMatch) {
            card.style.display = 'block';
            visibleCount++;

            // Animate in
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, visibleCount * 100);
        } else {
            // Animate out
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });

    // Update results count
    updateResultsCount(visibleCount);
}

function updateResultsCount(count) {
    let resultsElement = document.getElementById('results-count');

    if (!resultsElement) {
        resultsElement = document.createElement('div');
        resultsElement.id = 'results-count';
        resultsElement.className = 'results-count';

        const sectionHeader = document.querySelector('.featured-destinations .section-header');
        if (sectionHeader) {
            sectionHeader.appendChild(resultsElement);
        }
    }

    resultsElement.textContent = `${count} destination${count !== 1 ? 's' : ''} found`;
    resultsElement.style.color = var(--gray-600);
    resultsElement.style.fontSize = '0.9rem';
    resultsElement.style.marginTop = '10px';
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

    // Observe destination cards
    const destinationCards = document.querySelectorAll('.destination-card');
    destinationCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
        observer.observe(card);
    });

    // Observe trending items
    const trendingItems = document.querySelectorAll('.trending-item');
    trendingItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-30px)';
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
                    submitBtn.textContent = 'Get Deals';
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                    this.reset();
                }, 2000);
            }, 1000);
        });
    }
}

// Booking button functionality
function initializeBookingButtons() {
    const bookButtons = document.querySelectorAll('.btn-book');

    bookButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const destinationCard = this.closest('.destination-card');
            const destinationName = destinationCard.querySelector('h3').textContent;

            // Simulate booking process
            this.textContent = 'Booking...';
            this.disabled = true;

            setTimeout(() => {
                this.textContent = 'Booked!';
                this.style.background = '#28a745';

                // Show success message
                showBookingSuccess(destinationName);

                setTimeout(() => {
                    this.textContent = 'Book Now';
                    this.style.background = '';
                    this.disabled = false;
                }, 2000);
            }, 1000);
        });
    });
}

function showBookingSuccess(destinationName) {
    // Create success notification
    const notification = document.createElement('div');
    notification.className = 'booking-notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <span>Successfully booked ${destinationName}!</span>
        </div>
    `;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    `;

    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Remove after delay
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Add loading animation for images
function initializeImageLoading() {
    const destinationImages = document.querySelectorAll('.destination-image img, .trending-image img');

    destinationImages.forEach(img => {
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
    const hero = document.querySelector('.popular-hero');

    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = hero.querySelector('.hero-overlay');
            const rate = scrolled * -0.3;

            if (parallax) {
                parallax.style.transform = `translateY(${rate}px)`;
            }
        });
    }
}

// Initialize parallax
initializeParallax();
