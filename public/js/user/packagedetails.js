// Package Details Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeGallery();
    initializeBookingForm();
    initializeAnimations();
    initializeLoadMore();
    // Note: Tabs are now handled by Bootstrap 5 natively
});

// Gallery functionality
let currentImageIndex = 0;
let isZoomed = false;
const galleryImages = [
    'images/Istanbul-Sightseeing.jpg',
    'images/istanbul.webp',
    'images/Cappadocia.jpg',
    'images/Bodrum.webp',
    'images/Antalya.jpg'
];

// Pre-generate asset URLs for gallery images
const galleryImageUrls = galleryImages.map(image => `/images/${image}`);

function initializeGallery() {
    // Gallery modal functionality is already handled by onclick attributes
    // This function can be extended for additional gallery features

    // Add click handlers for thumbnail items
    const thumbnailItems = document.querySelectorAll('.thumbnail-item');
    thumbnailItems.forEach((item, index) => {
        item.addEventListener('click', () => openGallery(index + 1)); // +1 because first image is main
    });

    // Initialize thumbnail strip if it exists
    initializeThumbnailStrip();

    // Add zoom functionality
    initializeZoomFunctionality();

    // Add keyboard shortcuts
    initializeKeyboardShortcuts();
}

function initializeThumbnailStrip() {
    const modal = document.getElementById('galleryModal');
    if (!modal) return;

    // Create thumbnail strip if it doesn't exist
    let thumbnailStrip = modal.querySelector('.thumbnail-strip');
    if (!thumbnailStrip) {
        thumbnailStrip = document.createElement('div');
        thumbnailStrip.className = 'thumbnail-strip';
        modal.appendChild(thumbnailStrip);

        // Add thumbnails to strip
        galleryImages.forEach((image, index) => {
            const thumbnailItem = document.createElement('div');
            thumbnailItem.className = 'thumbnail-strip-item';
            thumbnailItem.onclick = () => openGallery(index);

            const img = document.createElement('img');
            img.src = `/images/${image}`;
            img.alt = `Gallery image ${index + 1}`;
            img.loading = 'lazy';

            thumbnailItem.appendChild(img);
            thumbnailStrip.appendChild(thumbnailItem);
        });
    }

    // Update active thumbnail
    updateActiveThumbnail();
}

function initializeZoomFunctionality() {
    const modalImage = document.getElementById('modalImage');
    if (!modalImage) return;

    // Add double-click to zoom
    modalImage.addEventListener('dblclick', toggleZoom);

    // Add zoom on mouse wheel
    modalImage.addEventListener('wheel', (e) => {
        e.preventDefault();
        if (e.deltaY < 0) {
            zoomIn();
        } else {
            zoomOut();
        }
    });
}

function initializeKeyboardShortcuts() {
    document.addEventListener('keydown', (e) => {
        const modal = document.getElementById('galleryModal');
        if (!modal || !modal.classList.contains('active')) return;

        switch(e.key) {
            case 'Escape':
                closeGallery();
                break;
            case 'ArrowLeft':
                previousImage();
                break;
            case 'ArrowRight':
                nextImage();
                break;
            case 'z':
            case 'Z':
                toggleZoom();
                break;
            case '+':
            case '=':
                e.preventDefault();
                zoomIn();
                break;
            case '-':
                e.preventDefault();
                zoomOut();
                break;
        }
    });
}

function openGallery(index) {
    currentImageIndex = index;
    const modal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('modalImage');

    if (modal && modalImage) {
        // Reset zoom state
        isZoomed = false;
        modalImage.classList.remove('zoomed');

        // Ensure modal is properly reset
        modal.classList.remove('active');
        modal.style.pointerEvents = 'none';

        // Set image source
        modalImage.src = galleryImageUrls[currentImageIndex];

        // Small delay to ensure image loads
        setTimeout(() => {
            modal.classList.add('active');
            modal.style.pointerEvents = 'auto';
            preventBodyScroll();

            // Add fade-in effect
            modalImage.style.opacity = '0';
            setTimeout(() => {
                modalImage.style.opacity = '1';
            }, 50);

            // Update image counter
            updateImageCounter();

            // Update active thumbnail
            updateActiveThumbnail();
        }, 10);
    }
}

function updateImageCounter() {
    const modal = document.getElementById('galleryModal');
    if (!modal) return;

    let counter = modal.querySelector('.image-counter');
    if (!counter) {
        counter = document.createElement('div');
        counter.className = 'image-counter';
        modal.appendChild(counter);
    }

    counter.textContent = `${currentImageIndex + 1} of ${galleryImages.length}`;
}

function updateActiveThumbnail() {
    const modal = document.getElementById('galleryModal');
    if (!modal) return;

    const thumbnails = modal.querySelectorAll('.thumbnail-strip-item');
    thumbnails.forEach((thumb, index) => {
        if (index === currentImageIndex) {
            thumb.classList.add('active');
        } else {
            thumb.classList.remove('active');
        }
    });
}

function closeGallery() {
    const modal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('modalImage');

    if (modal && modalImage) {
        modalImage.style.opacity = '0';
        setTimeout(() => {
            modal.classList.remove('active');
            allowBodyScroll();
            // Reset pointer events
            modal.style.pointerEvents = 'none';
        }, 300);
    }
}

// Close modal when clicking outside of it
document.addEventListener('click', function(e) {
    const modal = document.getElementById('galleryModal');
    const modalContent = modal?.querySelector('.modal-content');

    if (modal && modal.classList.contains('active')) {
        if (e.target === modal || (modalContent && !modalContent.contains(e.target))) {
            closeGallery();
        }
    }
});

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
    updateGalleryImage();
}

function previousImage() {
    currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
    updateGalleryImage();
}

function updateGalleryImage() {
    const modalImage = document.getElementById('modalImage');

    if (modalImage) {
        // Reset zoom when changing images
        isZoomed = false;
        modalImage.classList.remove('zoomed');

        modalImage.style.opacity = '0';
        setTimeout(() => {
            modalImage.src = galleryImageUrls[currentImageIndex];
            modalImage.style.opacity = '1';

            // Update UI elements
            updateImageCounter();
            updateActiveThumbnail();
        }, 150);
    }
}

function toggleZoom() {
    const modalImage = document.getElementById('modalImage');
    if (!modalImage) return;

    isZoomed = !isZoomed;

    if (isZoomed) {
        modalImage.classList.add('zoomed');
    } else {
        modalImage.classList.remove('zoomed');
    }
}

function zoomIn() {
    const modalImage = document.getElementById('modalImage');
    if (!modalImage || isZoomed) return;

    isZoomed = true;
    modalImage.classList.add('zoomed');
}

function zoomOut() {
    const modalImage = document.getElementById('modalImage');
    if (!modalImage || !isZoomed) return;

    isZoomed = false;
    modalImage.classList.remove('zoomed');
}

// Booking form functionality
function initializeBookingForm() {
    const bookNowBtn = document.getElementById('bookNowBtn');
    const departureDate = document.getElementById('departureDate');
    const travelers = document.getElementById('travelers');

    if (bookNowBtn) {
        bookNowBtn.addEventListener('click', function() {
            handleBooking();
        });
    }

    // Set minimum date for departure
    if (departureDate) {
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        departureDate.min = tomorrow.toISOString().split('T')[0];
    }
}

function handleBooking() {
    const departureDate = document.getElementById('departureDate').value;
    const travelers = document.getElementById('travelers').value;

    if (!departureDate) {
        showNotification('Please select a departure date', 'error');
        return;
    }

    if (!travelers) {
        showNotification('Please select number of travelers', 'error');
        return;
    }

    // Show loading state
    const bookNowBtn = document.getElementById('bookNowBtn');
    const originalText = bookNowBtn.innerHTML;
    bookNowBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    bookNowBtn.disabled = true;

    // Simulate booking process
    setTimeout(() => {
        showNotification('Booking request submitted successfully! We will contact you shortly.', 'success');
        bookNowBtn.innerHTML = originalText;
        bookNowBtn.disabled = false;
    }, 2000);
}

// Animation functionality
function initializeAnimations() {
    // Intersection Observer for scroll animations
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

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.timeline-item, .review-card, .related-card, .highlight-item');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });

    // Add CSS for animate-in class
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
}

// Load more functionality
function initializeLoadMore() {
    const loadMoreBtn = document.querySelector('.btn-load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            loadMoreReviews();
        });
    }
}

function loadMoreReviews() {
    const loadMoreBtn = document.querySelector('.btn-load-more');
    const originalText = loadMoreBtn.textContent;

    // Show loading state
    loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
    loadMoreBtn.disabled = true;

    // Simulate loading more reviews
    setTimeout(() => {
        showNotification('More reviews loaded successfully!', 'success');
        loadMoreBtn.innerHTML = originalText;
        loadMoreBtn.disabled = false;
    }, 1500);
}

// Notification system
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
            <button class="notification-close" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    // Add notification styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${getNotificationColor(type)};
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 400px;
        backdrop-filter: blur(10px);
    `;

    // Add notification content styles
    const content = notification.querySelector('.notification-content');
    content.style.cssText = `
        display: flex;
        align-items: center;
        gap: 10px;
    `;

    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 5px;
        margin-left: auto;
    `;

    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        'success': 'check-circle',
        'error': 'exclamation-circle',
        'warning': 'exclamation-triangle',
        'info': 'info-circle'
    };
    return icons[type] || 'info-circle';
}

function getNotificationColor(type) {
    const colors = {
        'success': 'linear-gradient(135deg, #28a745, #20c997)',
        'error': 'linear-gradient(135deg, #dc3545, #fd7e14)',
        'warning': 'linear-gradient(135deg, #ffc107, #fd7e14)',
        'info': 'linear-gradient(135deg, #17a2b8, #6f42c1)'
    };
    return colors[type] || 'linear-gradient(135deg, #6c757d, #495057)';
}

// Smooth scrolling for anchor links
document.addEventListener('click', function(e) {
    if (e.target.matches('a[href^="#"]')) {
        e.preventDefault();
        const targetId = e.target.getAttribute('href');
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
});

// Form validation
function validateForm(formData) {
    const errors = [];

    if (!formData.departureDate) {
        errors.push('Departure date is required');
    }

    if (!formData.travelers || formData.travelers < 1) {
        errors.push('Number of travelers is required');
    }

    return errors;
}

// Utility function to format currency
function formatCurrency(amount, currency = '$') {
    return currency + amount.toLocaleString();
}

// Utility function to format date
function formatDate(date) {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

// Star rating display
function displayRating(rating, elementId) {
    const element = document.getElementById(elementId);
    if (!element) return;

    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

    let starsHTML = '';

    // Full stars
    for (let i = 0; i < fullStars; i++) {
        starsHTML += '<i class="fas fa-star filled"></i>';
    }

    // Half star
    if (hasHalfStar) {
        starsHTML += '<i class="fas fa-star-half-alt filled"></i>';
    }

    // Empty stars
    for (let i = 0; i < emptyStars; i++) {
        starsHTML += '<i class="far fa-star"></i>';
    }

    element.innerHTML = starsHTML;
}

// Keyboard navigation for gallery
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('galleryModal');
    if (!modal.classList.contains('active')) return;

    switch(e.key) {
        case 'Escape':
            closeGallery();
            break;
        case 'ArrowLeft':
            previousImage();
            break;
        case 'ArrowRight':
            nextImage();
            break;
    }
});

// Touch/swipe support for gallery
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener('touchstart', function(e) {
    touchStartX = e.changedTouches[0].screenX;
});

document.addEventListener('touchend', function(e) {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            nextImage();
        } else {
            previousImage();
        }
    }
}

// Lazy loading for images
function initializeLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading when DOM is ready
document.addEventListener('DOMContentLoaded', initializeLazyLoading);

// Window resize handler to close modal if needed
window.addEventListener('resize', function() {
    const modal = document.getElementById('galleryModal');
    if (modal && modal.classList.contains('active')) {
        // Close modal on resize to prevent layout issues
        closeGallery();
    }
});

// Prevent body scroll when modal is active
function preventBodyScroll() {
    const scrollY = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollY}px`;
    document.body.style.width = '100%';
}

function allowBodyScroll() {
    const scrollY = document.body.style.top;
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);
}

// Note: Tabs are now handled by Bootstrap 5 natively - no additional JavaScript needed
