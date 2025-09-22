// Best Deals Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS (Animate On Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    }

    // Countdown timers
    initializeCountdownTimers();

    // Category filter functionality
    const categoryBtns = document.querySelectorAll('.category-btn');

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryBtns.forEach(b => b.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Apply category filter
            const category = this.dataset.category;
            filterDealsByCategory(category);
        });
    });

    // Filter functionality
    const discountFilter = document.getElementById('discountFilter');
    const durationFilter = document.getElementById('durationFilter');
    const priceFilter = document.getElementById('priceFilter');
    const resetFiltersBtn = document.getElementById('resetFilters');

    if (discountFilter) {
        discountFilter.addEventListener('change', function() {
            applyFilters();
        });
    }

    if (durationFilter) {
        durationFilter.addEventListener('change', function() {
            applyFilters();
        });
    }

    if (priceFilter) {
        priceFilter.addEventListener('change', function() {
            applyFilters();
        });
    }

    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', function() {
            resetAllFilters();
        });
    }

    // Initialize countdown timers
    function initializeCountdownTimers() {
        const countdownElements = document.querySelectorAll('.countdown[data-date]');

        countdownElements.forEach(element => {
            const targetDate = new Date(element.dataset.date).getTime();
            const dealId = element.closest('.deal-card').querySelector('.countdown-number').id.split('-')[1];

            // Update countdown every second
            const countdownInterval = setInterval(() => {
                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance > 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Update countdown display
                    const daysElement = document.getElementById(`days-${dealId}`);
                    const hoursElement = document.getElementById(`hours-${dealId}`);
                    const minutesElement = document.getElementById(`minutes-${dealId}`);

                    if (daysElement) daysElement.textContent = days.toString().padStart(2, '0');
                    if (hoursElement) hoursElement.textContent = hours.toString().padStart(2, '0');
                    if (minutesElement) minutesElement.textContent = minutes.toString().padStart(2, '0');

                    // Add urgency styling when time is running low
                    if (days === 0 && hours < 24) {
                        element.classList.add('urgent');
                    }
                } else {
                    // Deal has expired
                    clearInterval(countdownInterval);
                    element.innerHTML = '<div class="expired">EXPIRED</div>';

                    // Disable booking button
                    const bookBtn = element.closest('.deal-card').querySelector('.btn-book-deal');
                    if (bookBtn) {
                        bookBtn.disabled = true;
                        bookBtn.textContent = 'Deal Expired';
                        bookBtn.style.background = '#6c757d';
                    }
                }
            }, 1000);
        });
    }

    // Filter deals by category
    function filterDealsByCategory(category) {
        const dealCards = document.querySelectorAll('.deal-card');
        let visibleCount = 0;

        dealCards.forEach(card => {
            const cardCategory = card.dataset.category;

            if (category === 'all' || cardCategory === category) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update category button counts
        updateCategoryCounts();
    }

    // Apply all filters
    function applyFilters() {
        const discountValue = discountFilter ? discountFilter.value : 'all';
        const durationValue = durationFilter ? durationFilter.value : 'all';
        const priceValue = priceFilter ? priceFilter.value : 'all';

        const dealCards = document.querySelectorAll('.deal-card');
        let visibleCount = 0;

        dealCards.forEach(card => {
            const discount = parseInt(card.dataset.discount);
            const price = parseFloat(card.dataset.price);
            const duration = card.dataset.duration || '';

            let showItem = true;

            // Discount filter
            if (discountValue !== 'all') {
                if (discountValue === '20-30' && (discount < 20 || discount >= 30)) showItem = false;
                else if (discountValue === '30-40' && (discount < 30 || discount >= 40)) showItem = false;
                else if (discountValue === '40-50' && (discount < 40 || discount >= 50)) showItem = false;
                else if (discountValue === '50+' && discount < 50) showItem = false;
            }

            // Duration filter
            if (durationValue !== 'all') {
                if (durationValue === '1-3' && !duration.includes('1') && !duration.includes('2') && !duration.includes('3')) showItem = false;
                else if (durationValue === '4-7' && !duration.includes('4') && !duration.includes('5') && !duration.includes('6') && !duration.includes('7')) showItem = false;
                else if (durationValue === '7+' && !duration.includes('7') && !duration.includes('8') && !duration.includes('10')) showItem = false;
            }

            // Price filter
            if (priceValue !== 'all') {
                if (priceValue === '0-300' && price >= 300) showItem = false;
                else if (priceValue === '300-600' && (price < 300 || price >= 600)) showItem = false;
                else if (priceValue === '600-1000' && (price < 600 || price >= 1000)) showItem = false;
                else if (priceValue === '1000+' && price < 1000) showItem = false;
            }

            if (showItem) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update category button counts
        updateCategoryCounts();
    }

    // Update category button counts
    function updateCategoryCounts() {
        const categoryBtns = document.querySelectorAll('.category-btn');
        const dealCards = document.querySelectorAll('.deal-card');

        categoryBtns.forEach(btn => {
            const category = btn.dataset.category;
            let count = 0;

            if (category === 'all') {
                count = dealCards.length;
            } else {
                dealCards.forEach(card => {
                    if (card.style.display !== 'none') {
                        const cardCategory = card.dataset.category;
                        if (cardCategory === category) {
                            count++;
                        }
                    }
                });
            }

            const countElement = btn.querySelector('.deal-count');
            if (countElement) {
                countElement.textContent = count;
            }
        });
    }

    // Reset all filters
    function resetAllFilters() {
        // Reset category filter
        categoryBtns.forEach(btn => btn.classList.remove('active'));
        const allBtn = document.querySelector('.category-btn[data-category="all"]');
        if (allBtn) allBtn.classList.add('active');

        // Reset select filters
        if (discountFilter) discountFilter.value = 'all';
        if (durationFilter) durationFilter.value = 'all';
        if (priceFilter) priceFilter.value = 'all';

        // Show all deals
        const dealCards = document.querySelectorAll('.deal-card');
        dealCards.forEach(card => {
            card.style.display = 'block';
        });

        // Update counts
        updateCategoryCounts();
    }

    // Global function for clearing filters (called from HTML)
    window.clearAllFilters = resetAllFilters;

    // Deal card hover effects
    const dealCards = document.querySelectorAll('.deal-card');

    dealCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const urgencyIndicators = this.querySelector('.urgency-indicators');
            if (urgencyIndicators) {
                urgencyIndicators.style.transform = 'scale(1.05)';
            }
        });

        card.addEventListener('mouseleave', function() {
            const urgencyIndicators = this.querySelector('.urgency-indicators');
            if (urgencyIndicators) {
                urgencyIndicators.style.transform = 'scale(1)';
            }
        });
    });

    // Book deal button functionality
    const bookDealBtns = document.querySelectorAll('.btn-book-deal');

    bookDealBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const dealCard = this.closest('.deal-card');
            const dealName = dealCard.querySelector('.deal-name').textContent;
            const dealPrice = dealCard.querySelector('.discounted-price').textContent;

            // Here you would typically redirect to booking page or show booking modal
            console.log(`Booking deal: ${dealName} for ${dealPrice}`);

            // Show confirmation
            const originalText = this.textContent;
            this.textContent = 'Booking...';
            this.disabled = true;

            setTimeout(() => {
                this.textContent = 'Booked!';
                this.style.background = '#28a745';

                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.background = '';
                    this.disabled = false;
                }, 2000);
            }, 1000);
        });
    });

    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = this.querySelector('input[type="email"]').value;
            const button = this.querySelector('button');

            if (email) {
                // Save original button text
                const originalText = button.textContent;

                // Show loading state
                button.textContent = 'Subscribing...';
                button.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    button.textContent = 'Subscribed!';
                    button.style.background = '#28a745';

                    setTimeout(() => {
                        button.textContent = originalText;
                        button.style.background = '';
                        button.disabled = false;
                        this.querySelector('input[type="email"]').value = '';
                    }, 2000);
                }, 1000);
            }
        });
    }

    // Add urgency animations for deals with limited spots
    const spotsLeftElements = document.querySelectorAll('.spots-left');

    spotsLeftElements.forEach(element => {
        const spotsText = element.textContent;
        const spotsMatch = spotsText.match(/(\d+)/);

        if (spotsMatch && parseInt(spotsMatch[1]) <= 5) {
            element.style.animation = 'pulse 1s infinite';
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
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

    // Add click tracking for analytics
    document.querySelectorAll('.btn-book-deal').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const dealCard = this.closest('.deal-card');
            const dealName = dealCard.querySelector('.deal-name').textContent;
            const dealPrice = dealCard.querySelector('.discounted-price').textContent;

            // Here you would typically send analytics data
            console.log(`User clicked "Book Now" for deal: ${dealName} at ${dealPrice}`);

            // Track conversion
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    event_category: 'deals',
                    event_label: dealName,
                    value: dealPrice.replace('$', '')
                });
            }
        });
    });

    // Add loading animation for images
    const dealImages = document.querySelectorAll('.deal-image img');

    dealImages.forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });

        img.addEventListener('error', function() {
            this.src = 'https://via.placeholder.com/400x200?text=Image+Not+Available';
            this.alt = 'Image not available';
        });
    });
});
