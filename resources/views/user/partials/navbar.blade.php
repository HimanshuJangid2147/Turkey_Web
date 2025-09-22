@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/dropdown.css') }}">
@endpush

<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-0.5" id="mainNavbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold" href="/">
      <div class="d-flex align-items-center">
          <img src="{{ asset('icons/Satguru-new-preloader.gif') }}" alt="Logo" class="brand-icon" height="60" width="100">
        <span class="brand-text ms-2">Turkey Travel</span>
      </div>
    </a>

    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="toggler-line"></span>
      <span class="toggler-line"></span>
      <span class="toggler-line"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- Home Link -->
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/">
            <i class="bi bi-house-door-fill me-1"></i>Home
          </a>
        </li>

        <!-- Tours & Services Dropdown -->
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center dropdown-toggle" href="#" id="toursDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-briefcase-fill me-1"></i>Tours & Services
            <i class="bi bi-caret-down-fill ms-1"></i>
          </a>
          <div class="dropdown-menu dropdown-scrollable" aria-labelledby="toursDropdown">
            <div class="dropdown-grid">
              <h6 class="dropdown-header">Choose Your Tour Type</h6>
              <a class="dropdown-item" href="/inbound-tour">
                <i class="bi bi-airplane me-2"></i>Inbound Tours
              </a>
              <a class="dropdown-item" href="/outbound-tours">
                <i class="bi bi-airplane-engines me-2"></i>Outbound Tours
              </a>
              <a class="dropdown-item" href="/select-dates">
                <i class="bi bi-calendar-check me-2"></i>Select Dates
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/packages">
                <i class="bi bi-box-seam me-2"></i>Package Details
              </a>
            </div>
          </div>
        </li>

        <!-- Destinations Dropdown -->
        <li class="nav-item dropdown me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center dropdown-toggle" href="#" id="destinationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-compass-fill me-1"></i>Destinations
            <i class="bi bi-caret-down-fill ms-1"></i>
          </a>
          <div class="dropdown-menu dropdown-scrollable" aria-labelledby="destinationsDropdown">
            <div class="dropdown-grid">
              <h6 class="dropdown-header">Choose Your Destination</h6>
              <a class="dropdown-item" href="/destinations/popular">
                <i class="bi bi-star-fill me-2"></i>Popular Destinations
              </a>
              <a class="dropdown-item" href="/destinations/categories">
                <i class="bi bi-grid-3x3-gap me-2"></i>Destination Categories
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="/destinations/africa">
                <i class="bi bi-compass me-2"></i>Africa
              </a>
              <a class="dropdown-item" href="/destinations/australasia">
                <i class="bi bi-compass me-2"></i>Australasia
              </a>
              <a class="dropdown-item" href="/destinations/central-america-caribbean">
                <i class="bi bi-compass me-2"></i>Central America & Caribbean
              </a>
              <a class="dropdown-item" href="/destinations/central-asia">
                <i class="bi bi-compass me-2"></i>Central Asia
              </a>
              <a class="dropdown-item" href="/destinations/europe">
                <i class="bi bi-compass me-2"></i>Europe
              </a>
              <a class="dropdown-item" href="/destinations/far-east">
                <i class="bi bi-compass me-2"></i>Far East
              </a>
              <a class="dropdown-item" href="/destinations/indian-subcontinent">
                <i class="bi bi-compass me-2"></i>Indian Subcontinent
              </a>
              <a class="dropdown-item" href="/destinations/middle-east">
                <i class="bi bi-compass me-2"></i>Middle East
              </a>
              <a class="dropdown-item" href="/destinations/north-america">
                <i class="bi bi-compass me-2"></i>North America
              </a>
              <a class="dropdown-item" href="/destinations/polar-regions">
                <i class="bi bi-compass me-2"></i>Polar Regions
              </a>
              <a class="dropdown-item" href="/destinations/south-america">
                <i class="bi bi-compass me-2"></i>South America
              </a>
              <a class="dropdown-item" href="/destinations/south-east-asia">
                <i class="bi bi-compass me-2"></i>South East Asia
              </a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="/all-destinations">
                <i class="bi bi-grid-3x3-gap me-2"></i>View All Destinations
              </a>
            </div>
          </div>
        </li>

        <!-- About Us -->
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/about">
            <i class="bi bi-info-circle-fill me-1"></i>About Us
          </a>
        </li>

        <!-- Vlogs -->
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/vlogs">
            <i class="bi bi-play-circle-fill me-1"></i>Vlogs
          </a>
        </li>

        <!-- Privacy Policy -->
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/privacy-policy">
            <i class="bi bi-shield-check me-1"></i>Privacy Policy
          </a>
        </li>

        <!-- Contact Us Button -->
        <li class="nav-item">
          <a class="btn btn-info contact-btn text-white rounded-pill px-4 py-2" href="/contact">
            <i class="bi bi-envelope-fill me-1"></i>Contact Us
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@push('scripts')
    <script src="{{ asset('js/user/navbar.js') }}"></script>

@endpush
