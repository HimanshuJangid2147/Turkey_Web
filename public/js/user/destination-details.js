// Destination Details Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeNavigation();
    initializeBookingForm();
    initializeGallery();
    initializeAnimations();
    initializeScrollEffects();
});

// Navigation functionality
function initializeNavigation() {
    const navTabs = document.querySelectorAll('.nav-tab');

    navTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                // Update active tab
                navTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Smooth scroll to section
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Update URL without page reload
                if (history.pushState) {
                    const newUrl = window.location.pathname + '#' + targetId;
                    history.pushState(null, null, newUrl);
                }
            }
        });
    });

    // Handle initial hash on page load
    if (window.location.hash) {
        const targetTab = document.querySelector(`a[href="${window.location.hash}"]`);
        if (targetTab) {
            targetTab.click();
        }
    }
}

// Booking form functionality
function initializeBookingForm() {
    const bookingForm = document.querySelector('.booking-form');
    const bookButtons = document.querySelectorAll('.btn-book-now, .btn-book');

    // Handle form submission
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('.btn-book');

            // Simulate booking process
            submitBtn.textContent = 'Processing...';
            submitBtn.disabled = true;

            setTimeout(() => {
                submitBtn.textContent = 'Booking Confirmed!';
                submitBtn.style.background = '#28a745';

                // Show success message
                showBookingSuccess();

                setTimeout(() => {
                    submitBtn.textContent = 'Proceed to Payment';
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                }, 2000);
            }, 1500);
        });
    }

    // Handle book now buttons
    bookButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            // Scroll to booking section
            const bookingSection = document.getElementById('booking');
            if (bookingSection) {
                bookingSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

function showBookingSuccess() {
    // Create success notification
    const notification = document.createElement('div');
    notification.className = 'booking-success-notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <div class="notification-text">
                <h4>Booking Successful!</h4>
                <p>Your booking has been confirmed. Check your email for details.</p>
            </div>
        </div>
    `;

    // Add styles
    Object.assign(notification.style, {
        position: 'fixed',
        top: '100px',
        right: '20px',
        background: 'linear-gradient(135deg, #28a745 0%, #20c997 100%)',
        color: 'white',
        padding: '20px',
        borderRadius: '15px',
        boxShadow: '0 10px 30px rgba(0, 0, 0, 0.2)',
        zIndex: '1000',
        transform: 'translateX(100%)',
        transition: 'transform 0.3s ease',
        maxWidth: '350px'
    });

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
    }, 5000);
}

// Gallery functionality
function initializeGallery() {
    const viewGalleryBtn = document.querySelector('.btn-view-gallery');
    const thumbnailItems = document.querySelectorAll('.thumbnail-item');

    // Handle view gallery button
    if (viewGalleryBtn) {
        viewGalleryBtn.addEventListener('click', function() {
            // This would typically open a modal or navigate to a gallery page
            showGalleryModal();
        });
    }

    // Handle thumbnail clicks
    thumbnailItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            // This would typically update the main gallery image
            const imgSrc = this.querySelector('img').src;
            const mainImage = document.querySelector('.gallery-main img');

            if (mainImage) {
                mainImage.style.opacity = '0.5';
                setTimeout(() => {
                    mainImage.src = imgSrc;
                    mainImage.style.opacity = '1';
                }, 200);
            }
        });
    });
}

function showGalleryModal() {
    // Create gallery modal
    const modal = document.createElement('div');
    modal.className = 'gallery-modal';
    modal.innerHTML = `
        <div class="modal-backdrop"></div>
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-gallery">
                <img src="${document.querySelector('.gallery-main img').src}" alt="Gallery image">
            </div>
            <div class="modal-thumbnails">
                ${Array.from(document.querySelectorAll('.thumbnail-item img')).map(img => `
                    <div class="modal-thumbnail">
                        <img src="${img.src}" alt="Gallery thumbnail">
                    </div>
                `).join('')}
            </div>
        </div>
    `;

    // Add modal styles
    Object.assign(modal.style, {
        position: 'fixed',
        top: '0',
        left: '0',
        width: '100%',
        height: '100%',
        zIndex: '1000',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center'
    });

    document.body.appendChild(modal);

    // Handle modal close
    const closeBtn = modal.querySelector('.modal-close');
    const backdrop = modal.querySelector('.modal-backdrop');

    const closeModal = () => {
        modal.style.opacity = '0';
        setTimeout(() => {
            document.body.removeChild(modal);
        }, 300);
    };

    closeBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    // Handle escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
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

    // Observe content sections
    const contentSections = document.querySelectorAll('.content-section');
    contentSections.forEach((section, index) => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
        observer.observe(section);
    });

    // Observe related cards
    const relatedCards = document.querySelectorAll('.related-card');
    relatedCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
        observer.observe(card);
    });
}

// Scroll effects
function initializeScrollEffects() {
    let ticking = false;

    function updateScrollEffects() {
        const scrolled = window.pageYOffset;
        const heroImage = document.querySelector('.hero-image img');

        if (heroImage) {
            const rate = scrolled * -0.5;
            heroImage.style.transform = `translateY(${rate}px)`;
        }

        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);
}

// Heart button functionality (save destination)
function initializeHeartButtons() {
    const heartButtons = document.querySelectorAll('.btn-outline i.fa-heart');

    heartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const isSaved = this.classList.contains('fas');

            if (isSaved) {
                this.classList.remove('fas');
                this.classList.add('far');
                this.style.color = 'var(--white)';
                showNotification('Removed from saved destinations', 'info');
            } else {
                this.classList.remove('far');
                this.classList.add('fas');
                this.style.color = '#ff6b6b';
                showNotification('Added to saved destinations', 'success');
            }
        });
    });
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;

    Object.assign(notification.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        background: type === 'success' ? '#28a745' : '#17a2b8',
        color: 'white',
        padding: '12px 20px',
        borderRadius: '8px',
        boxShadow: '0 4px 15px rgba(0, 0, 0, 0.2)',
        zIndex: '1000',
        transform: 'translateX(100%)',
        transition: 'transform 0.3s ease',
        fontSize: '0.9rem',
        fontWeight: '500'
    });

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

// Initialize heart buttons
initializeHeartButtons();

// Add loading animation for images
function initializeImageLoading() {
    const images = document.querySelectorAll('img');

    images.forEach(img => {
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
