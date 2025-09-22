// Safe Travel Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeSafeTravel();
});

function initializeSafeTravel() {
    // Initialize guideline accordion functionality
    initializeGuidelineAccordion();

    // Initialize emergency contact features
    initializeEmergencyFeatures();

    // Initialize smooth scrolling for internal links
    initializeSmoothScrolling();

    // Initialize safety tips animations
    initializeSafetyAnimations();
}

function initializeGuidelineAccordion() {
    const guidelineItems = document.querySelectorAll('.guideline-item');

    guidelineItems.forEach(item => {
        const question = item.querySelector('.guideline-question');
        const answer = item.querySelector('.guideline-answer');
        const toggleIcon = item.querySelector('.guideline-toggle-icon');

        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');

            // Close all guideline items
            guidelineItems.forEach(guidelineItem => {
                guidelineItem.classList.remove('active');
                const guidelineAnswer = guidelineItem.querySelector('.guideline-answer');
                const guidelineToggleIcon = guidelineItem.querySelector('.guideline-toggle-icon');

                guidelineAnswer.style.maxHeight = '0';
                guidelineAnswer.style.paddingTop = '0';
                guidelineAnswer.style.paddingBottom = '0';
                guidelineToggleIcon.style.transform = 'rotate(0deg)';
            });

            // If the clicked item wasn't active, open it
            if (!isActive) {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.paddingTop = '25px';
                answer.style.paddingBottom = '25px';
                toggleIcon.style.transform = 'rotate(45deg)';
            }
        });

        // Handle keyboard navigation
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                question.click();
            }
        });
    });
}

function initializeEmergencyFeatures() {
    const emergencyCards = document.querySelectorAll('.emergency-card');

    emergencyCards.forEach(card => {
        const number = card.querySelector('.emergency-number').textContent;

        // Add click-to-call functionality for mobile
        card.addEventListener('click', function() {
            if (isMobileDevice()) {
                window.location.href = `tel:${number}`;
            }
        });

        // Add hover effects for desktop
        card.addEventListener('mouseenter', function() {
            if (!isMobileDevice()) {
                showEmergencyTooltip(card, number);
            }
        });

        card.addEventListener('mouseleave', function() {
            hideEmergencyTooltip();
        });
    });
}

function showEmergencyTooltip(card, number) {
    const existingTooltip = document.querySelector('.emergency-tooltip');
    if (existingTooltip) {
        existingTooltip.remove();
    }

    const tooltip = document.createElement('div');
    tooltip.className = 'emergency-tooltip';
    tooltip.textContent = `Click to call ${number}`;
    tooltip.style.cssText = `
        position: absolute;
        background: var(--gray-800);
        color: var(--white);
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        white-space: nowrap;
        z-index: 1000;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    `;

    document.body.appendChild(tooltip);

    const rect = card.getBoundingClientRect();
    tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
    tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';

    // Trigger animation
    setTimeout(() => {
        tooltip.style.opacity = '1';
    }, 10);
}

function hideEmergencyTooltip() {
    const tooltip = document.querySelector('.emergency-tooltip');
    if (tooltip) {
        tooltip.style.opacity = '0';
        setTimeout(() => {
            tooltip.remove();
        }, 300);
    }
}

function isMobileDevice() {
    return window.innerWidth <= 768 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

function initializeSmoothScrolling() {
    // Smooth scroll for internal links
    const internalLinks = document.querySelectorAll('a[href^="#"]');

    internalLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

function initializeSafetyAnimations() {
    // Animate safety stat cards on scroll
    const statCards = document.querySelectorAll('.safety-stat-card');

    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // Animate guideline categories on scroll
    const guidelineCategories = document.querySelectorAll('.guideline-category');

    guidelineCategories.forEach((category, index) => {
        category.style.opacity = '0';
        category.style.transform = 'translateY(30px)';
        category.style.transition = `opacity 0.6s ease ${index * 0.2}s, transform 0.6s ease ${index * 0.2}s`;

        const categoryObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.2 });

        categoryObserver.observe(category);
    });
}

// Emergency contact quick access function
function quickEmergencyCall(service) {
    const emergencyNumbers = {
        'ambulance': '112',
        'police': '155',
        'fire': '110',
        'tourist-police': '155'
    };

    const number = emergencyNumbers[service];
    if (number) {
        if (isMobileDevice()) {
            window.location.href = `tel:${number}`;
        } else {
            // Copy to clipboard for desktop users
            navigator.clipboard.writeText(number).then(() => {
                showNotification(`Emergency number ${number} copied to clipboard`, 'success');
            }).catch(() => {
                showNotification('Unable to copy number. Please dial manually.', 'warning');
            });
        }
    }
}

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `safety-notification notification-${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? 'var(--success-color, #28a745)' : type === 'warning' ? 'var(--warning-color, #ffc107)' : 'var(--primary-color)'};
        color: var(--white);
        padding: 15px 20px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        z-index: 1000;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        max-width: 300px;
    `;

    document.body.appendChild(notification);

    // Trigger animation
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 10);

    // Auto remove after 4 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 4000);
}

// Safety checklist functionality (for future enhancement)
function initializeSafetyChecklist() {
    const checklistItems = document.querySelectorAll('.safety-checklist-item');

    checklistItems.forEach(item => {
        const checkbox = item.querySelector('.checklist-checkbox');
        const label = item.querySelector('.checklist-label');

        if (checkbox && label) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    label.style.textDecoration = 'line-through';
                    label.style.opacity = '0.7';
                } else {
                    label.style.textDecoration = 'none';
                    label.style.opacity = '1';
                }
            });
        }
    });
}

// Print safety information
function printSafetyInfo() {
    const printContent = document.querySelector('.guidelines-wrapper').innerHTML;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Safe Travel Guidelines</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .guideline-category { margin-bottom: 30px; }
                .category-header { border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
                .guideline-item { margin-bottom: 15px; }
                .guideline-question { font-weight: bold; }
                .guideline-answer { margin-top: 10px; margin-left: 20px; }
            </style>
        </head>
        <body>
            <h1>Safe Travel Guidelines - Turkey</h1>
            ${printContent}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Export functions for global access
window.SafeTravel = {
    quickEmergencyCall,
    printSafetyInfo,
    showNotification
};
