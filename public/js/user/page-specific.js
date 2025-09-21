/* Page-Specific JavaScript - Consolidated functionality for all pages */

/* ===== PACKAGE DETAILS PAGE ===== */
const PackageDetailsUtils = {
    init: () => {
        if (!document.querySelector('.package-hero')) return;

        PackageDetailsUtils.initGallery();
        PackageDetailsUtils.initBookingForm();
        PackageDetailsUtils.initAnimations();
        PackageDetailsUtils.initLoadMore();
    },

    initGallery: () => {
        let currentImageIndex = 0;
        const galleryImages = [
            'images/Istanbul-Sightseeing.jpg',
            'images/istanbul.webp',
            'images/Cappadocia.jpg',
            'images/Bodrum.webp',
            'images/Antalya.jpg'
        ];
        const galleryImageUrls = galleryImages.map(image => `/images/${image}`);

        // Gallery modal functionality
        const thumbnailItems = document.querySelectorAll('.thumbnail-item');
        thumbnailItems.forEach((item, index) => {
            item.addEventListener('click', () => PackageDetailsUtils.openGallery(index + 1));
        });

        // Keyboard navigation for gallery
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('galleryModal');
            if (!modal || !modal.classList.contains('active')) return;

            switch(e.key) {
                case 'Escape':
                    PackageDetailsUtils.closeGallery();
                    break;
                case 'ArrowLeft':
                    PackageDetailsUtils.previousImage();
                    break;
                case 'ArrowRight':
                    PackageDetailsUtils.nextImage();
                    break;
            }
        });

        // Touch/swipe support
        let touchStartX = 0, touchEndX = 0;
        document.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            PackageDetailsUtils.handleSwipe();
        });
    },

    openGallery: (index) => {
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('modalImage');

        if (!modal || !modalImage) return;

        currentImageIndex = index;
        modal.classList.remove('active');
        modal.style.pointerEvents = 'none';

        modalImage.src = `/images/${['Istanbul-Sightseeing.jpg', 'istanbul.webp', 'Cappadocia.jpg', 'Bodrum.webp', 'Antalya.jpg'][currentImageIndex]}`;

        setTimeout(() => {
            modal.classList.add('active');
            modal.style.pointerEvents = 'auto';
            ModalUtils.preventBodyScroll();

            modalImage.style.opacity = '0';
            setTimeout(() => {
                modalImage.style.opacity = '1';
            }, 50);
        }, 10);
    },

    closeGallery: () => {
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('modalImage');

        if (modal && modalImage) {
            modalImage.style.opacity = '0';
            setTimeout(() => {
                modal.classList.remove('active');
                ModalUtils.allowBodyScroll();
                modal.style.pointerEvents = 'none';
            }, 300);
        }
    },

    nextImage: () => {
        currentImageIndex = (currentImageIndex + 1) % 5;
        PackageDetailsUtils.updateGalleryImage();
    },

    previousImage: () => {
        currentImageIndex = (currentImageIndex - 1 + 5) % 5;
        PackageDetailsUtils.updateGalleryImage();
    },

    updateGalleryImage: () => {
        const modalImage = document.getElementById('modalImage');
        if (modalImage) {
            modalImage.style.opacity = '0';
            setTimeout(() => {
                modalImage.src = `/images/${['Istanbul-Sightseeing.jpg', 'istanbul.webp', 'Cappadocia.jpg', 'Bodrum.webp', 'Antalya.jpg'][currentImageIndex]}`;
                modalImage.style.opacity = '1';
            }, 150);
        }
    },

    handleSwipe: () => {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            diff > 0 ? PackageDetailsUtils.nextImage() : PackageDetailsUtils.previousImage();
        }
    },

    initBookingForm: () => {
        const bookNowBtn = document.getElementById('bookNowBtn');
        const departureDate = document.getElementById('departureDate');

        if (bookNowBtn) {
            bookNowBtn.addEventListener('click', PackageDetailsUtils.handleBooking);
        }

        if (departureDate) {
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            departureDate.min = tomorrow.toISOString().split('T')[0];
        }
    },

    handleBooking: () => {
        const departureDate = document.getElementById('departureDate').value;
        const travelers = document.getElementById('travelers').value;

        if (!departureDate) {
            NotificationSystem.show('Please select a departure date', 'error');
            return;
        }

        if (!travelers) {
            NotificationSystem.show('Please select number of travelers', 'error');
            return;
        }

        const bookNowBtn = document.getElementById('bookNowBtn');
        FormUtils.showLoading(bookNowBtn, 'Processing...');

        setTimeout(() => {
            FormUtils.hideLoading(bookNowBtn);
            NotificationSystem.show('Booking request submitted successfully! We will contact you shortly.', 'success');
        }, 2000);
    },

    initAnimations: () => {
        IntersectionObserverUtils.animateOnScroll('.timeline-item, .review-card, .related-card, .highlight-item');

        // Add CSS for animate-in class
        const style = document.createElement('style');
        style.textContent = `
            .animate-in {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    },

    initLoadMore: () => {
        const loadMoreBtn = document.querySelector('.btn-load-more');
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', PackageDetailsUtils.loadMoreReviews);
        }
    },

    loadMoreReviews: () => {
        const loadMoreBtn = document.querySelector('.btn-load-more');
        FormUtils.showLoading(loadMoreBtn, 'Loading...');

        setTimeout(() => {
            FormUtils.hideLoading(loadMoreBtn);
            NotificationSystem.show('More reviews loaded successfully!', 'success');
        }, 1500);
    }
};

/* ===== ALL DESTINATIONS PAGE ===== */
const AllDestinationsUtils = {
    init: () => {
        if (!document.getElementById('searchInput')) return;

        AllDestinationsUtils.initFilters();
        AllDestinationsUtils.initSorting();
        AllDestinationsUtils.initWishlist();
    },

    initFilters: () => {
        const searchInput = document.getElementById('searchInput');
        const categoryFilters = document.querySelectorAll('[data-filter="category"]');
        const durationFilters = document.querySelectorAll('[data-filter="duration"]');
        const destinationItems = document.querySelectorAll('.destination-item');

        let activeFilters = {
            category: 'All',
            duration: 'All',
            search: ''
        };

        // Search functionality
        searchInput.addEventListener('input', CoreUtils.debounce(() => {
            activeFilters.search = searchInput.value.toLowerCase();
            AllDestinationsUtils.filterAndSort();
        }, 300));

        // Category filters
        categoryFilters.forEach(btn => {
            btn.addEventListener('click', () => {
                categoryFilters.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                activeFilters.category = btn.dataset.value;
                AllDestinationsUtils.filterAndSort();
            });
        });

        // Duration filters
        durationFilters.forEach(btn => {
            btn.addEventListener('click', () => {
                durationFilters.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                activeFilters.duration = btn.dataset.value;
                AllDestinationsUtils.filterAndSort();
            });
        });

        // Store filters for access by other functions
        window.destinationFilters = activeFilters;
        window.destinationItems = destinationItems;
    },

    initSorting: () => {
        const sortSelect = document.getElementById('sortSelect');
        if (sortSelect) {
            sortSelect.addEventListener('change', AllDestinationsUtils.filterAndSort);
        }
    },

    initWishlist: () => {
        // Already handled by WishlistUtils in core.js
    },

    filterAndSort: () => {
        const activeFilters = window.destinationFilters;
        const destinationItems = window.destinationItems;
        const sortSelect = document.getElementById('sortSelect');
        const resultsCount = document.getElementById('resultsCount');
        const noResults = document.getElementById('noResults');

        if (!activeFilters || !destinationItems) return;

        let visibleItems = [];

        destinationItems.forEach(item => {
            const name = item.dataset.name.toLowerCase();
            const category = item.dataset.category;
            const duration = item.dataset.duration;

            let show = true;

            if (activeFilters.search && !name.includes(activeFilters.search)) {
                show = false;
            }

            if (activeFilters.category !== 'All' && category !== activeFilters.category) {
                show = false;
            }

            if (activeFilters.duration !== 'All' && duration !== activeFilters.duration) {
                show = false;
            }

            if (show) {
                visibleItems.push(item);
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // Sort visible items
        const sortValue = sortSelect ? sortSelect.value : 'featured';
        visibleItems.sort((a, b) => {
            switch (sortValue) {
                case 'price-low':
                    return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                case 'price-high':
                    return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                case 'rating':
                    return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                case 'name':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'featured':
                default:
                    return parseInt(b.dataset.featured) - parseInt(a.dataset.featured);
            }
        });

        // Reorder DOM elements
        const container = document.getElementById('destinationsContainer');
        if (container) {
            visibleItems.forEach(item => container.appendChild(item));
        }

        // Update results count
        if (resultsCount) {
            resultsCount.textContent = visibleItems.length;
        }

        // Show/hide no results message
        if (noResults) {
            noResults.style.display = visibleItems.length === 0 ? 'block' : 'none';
        }
    },

    clearAllFilters: () => {
        const activeFilters = window.destinationFilters;
        if (!activeFilters) return;

        activeFilters.category = 'All';
        activeFilters.duration = 'All';
        activeFilters.search = '';

        const searchInput = document.getElementById('searchInput');
        const categoryFilters = document.querySelectorAll('[data-filter="category"]');
        const durationFilters = document.querySelectorAll('[data-filter="duration"]');
        const sortSelect = document.getElementById('sortSelect');

        if (searchInput) searchInput.value = '';
        categoryFilters.forEach(btn => btn.classList.toggle('active', btn.dataset.value === 'All'));
        durationFilters.forEach(btn => btn.classList.toggle('active', btn.dataset.value === 'All'));
        if (sortSelect) sortSelect.value = 'featured';

        AllDestinationsUtils.filterAndSort();
    }
};

/* ===== CONTACT PAGE ===== */
const ContactUtils = {
    init: () => {
        // Bootstrap form validation already initialized in core.js
        // Add any additional contact-specific functionality here
    }
};

/* ===== ABOUT US PAGE ===== */
const AboutUsUtils = {
    init: () => {
        // Counter animation already initialized in core.js
        // Add any additional about us-specific functionality here
    }
};

/* ===== SELECT DATES PAGE ===== */
const SelectDatesUtils = {
    init: () => {
        // Add select dates-specific functionality here
        // Currently no specific JS was found for this page
    }
};

/* ===== PRIVACY POLICY PAGE ===== */
const PrivacyPolicyUtils = {
    init: () => {
        // Add privacy policy-specific functionality here
        // Currently no specific JS was found for this page
    }
};

/* ===== INITIALIZE PAGE-SPECIFIC FUNCTIONALITY ===== */
CoreUtils.ready(() => {
    // Initialize page-specific functionality based on current page
    const pageClasses = document.body.className.split(' ');

    if (pageClasses.includes('package-details')) {
        PackageDetailsUtils.init();
    }

    if (pageClasses.includes('all-destinations')) {
        AllDestinationsUtils.init();
    }

    if (pageClasses.includes('contact')) {
        ContactUtils.init();
    }

    if (pageClasses.includes('about-us')) {
        AboutUsUtils.init();
    }

    if (pageClasses.includes('select-dates')) {
        SelectDatesUtils.init();
    }

    if (pageClasses.includes('privacy-policy')) {
        PrivacyPolicyUtils.init();
    }

    // Make clearAllFilters globally available
    window.clearAllFilters = AllDestinationsUtils.clearAllFilters;
});
