// FAQ Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    initializeFAQ();
});

function initializeFAQ() {
    // Initialize accordion functionality
    initializeAccordion();

    // Initialize search functionality
    initializeSearch();

    // Initialize category filtering
    initializeCategoryFilter();
}

function initializeAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggleIcon = item.querySelector('.faq-toggle-icon');

        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');

            // Close all FAQ items
            faqItems.forEach(faqItem => {
                faqItem.classList.remove('active');
                const faqAnswer = faqItem.querySelector('.faq-answer');
                const faqToggleIcon = faqItem.querySelector('.faq-toggle-icon');

                faqAnswer.style.maxHeight = '0';
                faqAnswer.style.paddingTop = '0';
                faqAnswer.style.paddingBottom = '0';
                faqToggleIcon.style.transform = 'rotate(0deg)';
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

function initializeSearch() {
    const searchInput = document.getElementById('faqSearch');
    const faqItems = document.querySelectorAll('.faq-item');

    if (!searchInput) return;

    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch(this.value.toLowerCase(), faqItems);
        }, 300);
    });

    // Clear search when input is empty
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.value = '';
            showAllFAQs(faqItems);
        }
    });
}

function performSearch(searchTerm, faqItems) {
    let hasVisibleItems = false;

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
        const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
            item.classList.remove('hidden');
            hasVisibleItems = true;

            // Highlight search terms
            highlightSearchTerms(item, searchTerm);
        } else {
            item.style.display = 'none';
            item.classList.add('hidden');
        }
    });

    // Show/hide no results message
    toggleNoResultsMessage(hasVisibleItems);
}

function highlightSearchTerms(item, searchTerm) {
    if (!searchTerm) return;

    const question = item.querySelector('.faq-question h3');
    const answer = item.querySelector('.faq-answer');

    // Highlight in question
    highlightText(question, searchTerm);

    // Highlight in answer
    highlightText(answer, searchTerm);
}

function highlightText(element, searchTerm) {
    if (!element || !searchTerm) return;

    const innerHTML = element.innerHTML;
    const regex = new RegExp(`(${searchTerm})`, 'gi');
    const highlighted = innerHTML.replace(regex, '<mark class="search-highlight">$1</mark>');
    element.innerHTML = highlighted;
}

function showAllFAQs(faqItems) {
    faqItems.forEach(item => {
        item.style.display = 'block';
        item.classList.remove('hidden');
    });

    toggleNoResultsMessage(true);

    // Remove highlights
    removeHighlights();
}

function removeHighlights() {
    const highlights = document.querySelectorAll('.search-highlight');
    highlights.forEach(highlight => {
        highlight.outerHTML = highlight.innerHTML;
    });
}

function toggleNoResultsMessage(hasVisibleItems) {
    // This function can be extended to show/hide a "no results" message
    // For now, it's a placeholder for future enhancement
}

function initializeCategoryFilter() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const faqItems = document.querySelectorAll('.faq-item');

    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');

            // Update active button
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter FAQ items
            filterByCategory(category, faqItems);
        });
    });
}

function filterByCategory(category, faqItems) {
    let hasVisibleItems = false;

    faqItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category');

        if (category === 'all' || itemCategory === category) {
            item.style.display = 'block';
            item.classList.remove('hidden');
            hasVisibleItems = true;
        } else {
            item.style.display = 'none';
            item.classList.add('hidden');
        }
    });

    // Remove search highlights when filtering
    removeHighlights();

    // Clear search input when filtering
    const searchInput = document.getElementById('faqSearch');
    if (searchInput) {
        searchInput.value = '';
    }
}

// Smooth scroll to FAQ item when linked from other pages
function scrollToFAQItem(itemId) {
    const targetItem = document.querySelector(`[data-faq-id="${itemId}"]`);
    if (targetItem) {
        targetItem.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Open the FAQ item after scrolling
        setTimeout(() => {
            targetItem.querySelector('.faq-question').click();
        }, 500);
    }
}

// Auto-expand FAQ items based on URL hash
function handleURLHash() {
    const hash = window.location.hash.substring(1);
    if (hash) {
        const targetItem = document.querySelector(`[data-faq-id="${hash}"]`);
        if (targetItem) {
            setTimeout(() => {
                targetItem.querySelector('.faq-question').click();
                targetItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 1000);
        }
    }
}

// Initialize URL hash handling
document.addEventListener('DOMContentLoaded', function() {
    handleURLHash();
});

// Add search highlight styles dynamically
function addSearchHighlightStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .search-highlight {
            background-color: #fff3cd;
            padding: 2px 4px;
            border-radius: 3px;
            font-weight: 600;
        }
    `;
    document.head.appendChild(style);
}

// Initialize highlight styles
document.addEventListener('DOMContentLoaded', function() {
    addSearchHighlightStyles();
});
