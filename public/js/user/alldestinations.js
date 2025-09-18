document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const categoryFilters = document.querySelectorAll(
        '[data-filter="category"]'
    );
    const durationFilters = document.querySelectorAll(
        '[data-filter="duration"]'
    );
    const sortSelect = document.getElementById("sortSelect");
    const destinationItems = document.querySelectorAll(".destination-item");
    const resultsCount = document.getElementById("resultsCount");
    const noResults = document.getElementById("noResults");
    const wishlistBtns = document.querySelectorAll(".wishlist-btn");
    const toggleFiltersBtn = document.getElementById("toggleFiltersBtn");
    const filtersContent = document.getElementById("filtersContent");

    let activeFilters = {
        category: "All",
        duration: "All",
        search: "",
    };

    // Search functionality
    searchInput.addEventListener("input", function () {
        activeFilters.search = this.value.toLowerCase();
        filterAndSort();
    });

    // Category filters
    categoryFilters.forEach((btn) => {
        btn.addEventListener("click", function () {
            categoryFilters.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");
            activeFilters.category = this.dataset.value;
            filterAndSort();
        });
    });

    // Duration filters
    durationFilters.forEach((btn) => {
        btn.addEventListener("click", function () {
            durationFilters.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");
            activeFilters.duration = this.dataset.value;
            filterAndSort();
        });
    });

    // Sort functionality
    sortSelect.addEventListener("change", function () {
        filterAndSort();
    });

    // Wishlist functionality
    wishlistBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const icon = this.querySelector("i");
            if (icon.classList.contains("far")) {
                icon.classList.remove("far");
                icon.classList.add("fas");
                this.classList.add("active");
            } else {
                icon.classList.remove("fas");
                icon.classList.add("far");
                this.classList.remove("active");
            }
        });
    });

    // Toggle filters visibility with eye icon toggle
    toggleFiltersBtn.addEventListener("click", function () {
        const collapsedHeading = document.querySelector('.collapsed-filters-heading');
        if (
            filtersContent.style.display === "none" ||
            filtersContent.style.display === ""
        ) {
            filtersContent.style.display = "block";
            collapsedHeading.style.display = "none";
            toggleFiltersBtn.setAttribute("data-tooltip", "Hide Filters");
            toggleFiltersBtn.innerHTML =
                '<i class="fa fa-eye-slash"></i>';
        } else {
            filtersContent.style.display = "none";
            collapsedHeading.style.display = "block";
            toggleFiltersBtn.setAttribute("data-tooltip", "Show Filters");
            toggleFiltersBtn.innerHTML =
                '<span class="filter-toggle-text">Show Filters</span>';
        }
    });

    // Show filters by default
    filtersContent.style.display = "block";
    toggleFiltersBtn.setAttribute("data-tooltip", "Hide Filters");
    toggleFiltersBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';

    function filterAndSort() {
        let visibleItems = [];

        destinationItems.forEach((item) => {
            const name = item.dataset.name.toLowerCase();
            const category = item.dataset.category;
            const duration = item.dataset.duration;

            let show = true;

            // Search filter
            if (activeFilters.search && !name.includes(activeFilters.search)) {
                show = false;
            }

            // Category filter
            if (
                activeFilters.category !== "All" &&
                category !== activeFilters.category
            ) {
                show = false;
            }

            // Duration filter
            if (
                activeFilters.duration !== "All" &&
                duration !== activeFilters.duration
            ) {
                show = false;
            }

            if (show) {
                visibleItems.push(item);
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });

        // Sort visible items
        const sortValue = sortSelect.value;
        visibleItems.sort((a, b) => {
            switch (sortValue) {
                case "price-low":
                    return (
                        parseInt(a.dataset.price) - parseInt(b.dataset.price)
                    );
                case "price-high":
                    return (
                        parseInt(b.dataset.price) - parseInt(a.dataset.price)
                    );
                case "rating":
                    return (
                        parseFloat(b.dataset.rating) -
                        parseFloat(a.dataset.rating)
                    );
                case "name":
                    return a.dataset.name.localeCompare(b.dataset.name);
                case "featured":
                default:
                    return (
                        parseInt(b.dataset.featured) -
                        parseInt(a.dataset.featured)
                    );
            }
        });

        // Reorder DOM elements
        const container = document.getElementById("destinationsContainer");
        visibleItems.forEach((item) => {
            container.appendChild(item);
        });

        // Update results count
        resultsCount.textContent = visibleItems.length;

        // Show/hide no results message
        if (visibleItems.length === 0) {
            noResults.style.display = "block";
        } else {
            noResults.style.display = "none";
        }
    }

    window.clearAllFilters = function () {
        // Reset filters
        activeFilters = {
            category: "All",
            duration: "All",
            search: "",
        };

        // Reset UI
        searchInput.value = "";
        categoryFilters.forEach((btn) => {
            btn.classList.toggle("active", btn.dataset.value === "All");
        });
        durationFilters.forEach((btn) => {
            btn.classList.toggle("active", btn.dataset.value === "All");
        });
        sortSelect.value = "featured";

        filterAndSort();
    };
});
