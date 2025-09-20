// Package Details Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeGallery();
    initializeBookingForm();
    initializeAnimations();
    initializeLoadMore();
});

// Gallery functionality
let currentImageIndex = 0;
const galleryImages = [
    'images/Istanbul-Sightseeing.jpg',
    'images/istanbul.webp',
    'images/Cappadocia.jpg',
    'images/Bodrum.webp',
    'images/Antalya.jpg'
];

function initializeGallery() {
    // Gallery modal functionality is already handled by onclick attributes
    // This function can be extended for additional gallery features
}

function openGallery(index) {
    currentImageIndex = index;
    const modal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('modalImage');

    modalImage.src = '{{ asset("' + galleryImages[index] + '") }}';
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeGallery() {
    const modal = document.getElementById('galleryModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

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
    modalImage.src = '{{ asset("' + galleryImages[currentImageIndex] + '") }}';
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
