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
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/tours">
            <i class="bi bi-compass-fill me-1"></i>Tours
          </a>
        </li>
        <li class="nav-item me-lg-3">
          <a class="nav-link nav-link-enhanced fw-semibold d-flex align-items-center" href="/destinations">
            <i class="bi bi-map-fill me-1"></i>Destinations
          </a>
        </li>
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
