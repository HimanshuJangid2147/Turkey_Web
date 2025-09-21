/* Core JavaScript Utilities - Consolidated from all files */

/* ===== GLOBAL UTILITIES ===== */
const CoreUtils = {
    // DOM ready utility
    ready: (callback) => {
        if (document.readyState !== 'loading') {
            callback();
        } else {
            document.addEventListener('DOMContentLoaded', callback);
        }
    },

    // Debounce utility
    debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Throttle utility
    throttle: (func, limit) => {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    // Smooth scroll utility
    smoothScroll: (target, duration = 800) => {
        const targetElement = typeof target === 'string' ? document.querySelector(target) : target;
        if (!targetElement) return;

        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }
};

/* ===== NOTIFICATION SYSTEM ===== */
const NotificationSystem = {
    show: (message, type = 'info', duration = 5000) => {
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());

        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${NotificationSystem.getIcon(type)}"></i>
                <span>${message}</span>
                <button class="notification-close" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${NotificationSystem.getColor(type)};
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

        const content = notification.querySelector('.notification-content');
        content.style.cssText = `display: flex; align-items: center; gap: 10px;`;

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

        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }
        }, duration);

        return notification;
    },

    getIcon: (type) => {
        const icons = {
            'success': 'check-circle',
            'error': 'exclamation-circle',
            'warning': 'exclamation-triangle',
            'info': 'info-circle'
        };
        return icons[type] || 'info-circle';
    },

    getColor: (type) => {
        const colors = {
            'success': 'linear-gradient(135deg, #28a745, #20c997)',
            'error': 'linear-gradient(135deg, #dc3545, #fd7e14)',
            'warning': 'linear-gradient(135deg, #ffc107, #fd7e14)',
            'info': 'linear-gradient(135deg, #17a2b8, #6f42c1)'
        };
        return colors[type] || 'linear-gradient(135deg, #6c757d, #495057)';
    }
};

/* ===== INTERSECTION OBSERVER UTILITY ===== */
const IntersectionObserverUtils = {
    create: (callback, options = {}) => {
        const defaultOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        return new IntersectionObserver(callback, { ...defaultOptions, ...options });
    },

    // Animate elements on scroll
    animateOnScroll: (selector, animationClass = 'fade-in-up') => {
        const elements = document.querySelectorAll(selector);
        if (elements.length === 0) return;

        const observer = IntersectionObserverUtils.create((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        });

        elements.forEach(el => {
            el.classList.add(animationClass);
            observer.observe(el);
        });
    }
};

/* ===== FORM UTILITIES ===== */
const FormUtils = {
    // Bootstrap form validation
    initBootstrapValidation: () => {
        window.addEventListener('load', function() {
            const forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    },

    // Show loading state
    showLoading: (element, text = 'Loading...') => {
        const originalContent = element.innerHTML;
        element.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${text}`;
        element.disabled = true;
        element.dataset.originalContent = originalContent;
    },

    // Hide loading state
    hideLoading: (element) => {
        if (element.dataset.originalContent) {
            element.innerHTML = element.dataset.originalContent;
            delete element.dataset.originalContent;
        }
        element.disabled = false;
    }
};

/* ===== MODAL UTILITIES ===== */
const ModalUtils = {
    // Prevent body scroll when modal is active
    preventBodyScroll: () => {
        const scrollY = window.scrollY;
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollY}px`;
        document.body.style.width = '100%';
    },

    // Allow body scroll
    allowBodyScroll: () => {
        const scrollY = document.body.style.top;
        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.width = '';
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
    },

    // Close modal on escape key
    initEscapeKey: (modalSelector) => {
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.querySelector(modalSelector);
                if (modal && modal.classList.contains('active')) {
                    ModalUtils.close(modal);
                }
            }
        });
    },

    close: (modal) => {
        modal.classList.remove('active');
        ModalUtils.allowBodyScroll();
        modal.style.pointerEvents = 'none';
    }
};

/* ===== CAROUSEL UTILITIES ===== */
const CarouselUtils = {
    init: (carouselElement, options = {}) => {
        const defaultOptions = {
            interval: 6000,
            wrap: true,
            touch: true,
            keyboard: true
        };

        const carousel = new bootstrap.Carousel(carouselElement, { ...defaultOptions, ...options });

        // Enhanced indicator functionality
        const indicators = document.querySelectorAll('.carousel-indicators button');
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                indicators.forEach(ind => ind.classList.remove('active'));
                this.classList.add('active');
                carousel.to(index);
            });
        });

        // Update indicators on slide change
        carouselElement.addEventListener('slide.bs.carousel', function(e) {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === e.to);
            });
        });

        // Pause on hover
        carouselElement.addEventListener('mouseenter', () => carousel.pause());
        carouselElement.addEventListener('mouseleave', () => carousel.cycle());

        return carousel;
    }
};

/* ===== COUNTER ANIMATION ===== */
const CounterUtils = {
    animate: (counter) => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = Math.floor(current);
        }, 16);
    },

    init: () => {
        const counters = document.querySelectorAll('.counter');
        if (counters.length === 0) return;

        const observer = IntersectionObserverUtils.create((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    CounterUtils.animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        counters.forEach(counter => observer.observe(counter));
    }
};

/* ===== WISHLIST UTILITY ===== */
const WishlistUtils = {
    toggle: (button) => {
        const icon = button.querySelector('i');
        if (icon.classList.contains('far')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            button.classList.add('active');
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            button.classList.remove('active');
        }
    },

    init: () => {
        const wishlistBtns = document.querySelectorAll('.wishlist-btn');
        wishlistBtns.forEach(btn => {
            btn.addEventListener('click', () => WishlistUtils.toggle(btn));
        });
    }
};

/* ===== INITIALIZE ALL UTILITIES ===== */
CoreUtils.ready(() => {
    // Initialize all utilities
    FormUtils.initBootstrapValidation();
    CounterUtils.init();
    WishlistUtils.init();

    // Initialize smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            CoreUtils.smoothScroll(this.getAttribute('href'));
        });
    });
});
