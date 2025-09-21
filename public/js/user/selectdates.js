/**
 * Select Dates Page JavaScript - Availability Grid
 * Handles date selection, navigation, and booking functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functionality
    initializeDateSelection();
    initializeMonthNavigation();
    initializeQuickDateSelection();
    initializeDateOptionCards();
    initializeContinueButton();
});

/**
 * Initialize date selection functionality
 */
function initializeDateSelection() {
    // Set up current date for month navigation
    const currentDate = new Date();
    const currentMonth = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
    const monthElement = document.getElementById('currentMonth');

    if (monthElement) {
        monthElement.textContent = currentMonth;
    }
}

/**
 * Initialize month navigation
 */
function initializeMonthNavigation() {
    const prevBtn = document.getElementById('prevMonth');
    const nextBtn = document.getElementById('nextMonth');
    const currentMonthElement = document.getElementById('currentMonth');

    if (!prevBtn || !nextBtn || !currentMonthElement) return;

    let currentDate = new Date();

    // Previous month
    prevBtn.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateMonthDisplay(currentDate, currentMonthElement);
        // Removed toast notification as per user request
    });

    // Next month
    nextBtn.addEventListener('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateMonthDisplay(currentDate, currentMonthElement);
        // Removed toast notification as per user request
    });
}

/**
 * Update month display
 */
function updateMonthDisplay(date, element) {
    const monthYear = date.toLocaleString('default', { month: 'long', year: 'numeric' });
    element.textContent = monthYear;
}

/**
 * Initialize quick date selection
 */
function initializeQuickDateSelection() {
    const quickDateItems = document.querySelectorAll('.quick-date-item');

    quickDateItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all items
            quickDateItems.forEach(qdi => qdi.classList.remove('active'));

            // Add active class to clicked item
            this.classList.add('active');

            // Get selected date
            const selectedDate = this.dataset.date;

            // Show confirmation
            // Removed toast notification as per user request

            // Scroll to date options
            const dateOptionsGrid = document.querySelector('.date-options-grid');
            if (dateOptionsGrid) {
                dateOptionsGrid.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Initialize date option cards
 */
function initializeDateOptionCards() {
    const dateOptionCards = document.querySelectorAll('.date-option-card');

    dateOptionCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove selected class from all cards
            dateOptionCards.forEach(doc => doc.classList.remove('selected'));

            // Add selected class to clicked card
            this.classList.add('selected');

            // Add visual feedback
            this.style.borderColor = 'var(--primary-color)';
            this.style.background = 'linear-gradient(135deg, rgba(216, 160, 95, 0.1), rgba(216, 160, 95, 0.05))';

            // Get date information
            const departureDate = this.dataset.departure;
            const returnDate = this.dataset.return;

            // Show selection confirmation
            const dateText = this.querySelector('.date-text').textContent;
            // Removed toast notification as per user request

            // Update continue button
            updateContinueButton();
        });
    });
}

/**
 * Initialize continue button
 */
function initializeContinueButton() {
    const continueBtn = document.getElementById('continueBtn');

    if (!continueBtn) return;

    continueBtn.addEventListener('click', function() {
        const selectedCard = document.querySelector('.date-option-card.selected');

        if (!selectedCard) {
            // Removed toast notification as per user request
            return;
        }

        // Show loading state
        showLoadingState(continueBtn);

        // Simulate processing
        setTimeout(() => {
            hideLoadingState(continueBtn);
            // Removed toast notification as per user request

            // Here you would typically redirect to the booking page
            // window.location.href = '/booking';
        }, 2000);
    });
}

/**
 * Update continue button based on selection
 */
function updateContinueButton() {
    const continueBtn = document.getElementById('continueBtn');
    const selectedCard = document.querySelector('.date-option-card.selected');

    if (!continueBtn) return;

    if (selectedCard) {
        continueBtn.disabled = false;
        continueBtn.style.opacity = '1';
    } else {
        continueBtn.disabled = true;
        continueBtn.style.opacity = '0.6';
    }
}

/**
 * Show loading state
 */
function showLoadingState(button) {
    const originalText = button.innerHTML;
    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    button.style.opacity = '0.8';

    // Store original text for later
    button.dataset.originalText = originalText;
}

/**
 * Hide loading state
 */
function hideLoadingState(button) {
    button.disabled = false;
    button.innerHTML = button.dataset.originalText;
    button.style.opacity = '1';
}

/**
 * Show notification
 */
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
        </div>
    `;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${getNotificationColor(type)};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        animation: slideInRight 0.3s ease-out;
        max-width: 300px;
        font-size: 0.9rem;
    `;

    document.body.appendChild(notification);

    // Auto remove after 4 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }
    }, 4000);
}

/**
 * Get notification icon based on type
 */
function getNotificationIcon(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || 'info-circle';
}

/**
 * Get notification color based on type
 */
function getNotificationColor(type) {
    const colors = {
        success: 'linear-gradient(135deg, #28a745, #20c997)',
        error: 'linear-gradient(135deg, #dc3545, #fd7e14)',
        warning: 'linear-gradient(135deg, #fd7e14, #ffc107)',
        info: 'linear-gradient(135deg, #17a2b8, #6f42c1)'
    };
    return colors[type] || colors.info;
}

/**
 * Format date for display
 */
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

// Add CSS animations for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    .date-option-card.selected {
        border-color: var(--primary-color) !important;
        background: linear-gradient(135deg, rgba(216, 160, 95, 0.1), rgba(216, 160, 95, 0.05)) !important;
    }

    .btn-continue:disabled {
        cursor: not-allowed !important;
    }
`;
document.head.appendChild(style);
