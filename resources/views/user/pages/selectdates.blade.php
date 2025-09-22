@extends('user.layouts.app')
@section('title', 'Select Dates - Plan Your Perfect Turkey Trip')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/selectdates.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/user/selectdates.js') }}"></script>
@endpush

@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Select Dates', 'url' => '/selectdates']
        ]
    @endphp

    <!-- Package Info Header -->
    <section class="package-info-header" style="background-image: url('{{ asset('images/Untitled.png') }}');">
        <div class="container">
            <div class="package-card">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="package-title">Istanbul Discovery Tour</h1>
                        <div class="package-meta">
                            <span class="duration"><i class="fas fa-clock"></i> 8 Days</span>
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Istanbul, Cappadocia, Antalya</span>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                4.8 (234 reviews)
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="package-price">
                            <span class="original-price">$2,780</span>
                            <span class="discounted-price">$1,662</span>
                            <small>per person</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="select-dates-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step active">
                            <span class="step-number">1</span>
                            <span class="step-text">Select your preferred date</span>
                        </div>
                    </div>

                    <!-- Date Selection Container -->
                    <div class="date-selection-container">
                        <!-- Month Navigation -->
                        <div class="month-navigation">
                            <button class="nav-btn prev" id="prevMonth">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <h3 class="current-month" id="currentMonth">November 2025</h3>
                            <button class="nav-btn next" id="nextMonth">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- Quick Date Selection -->
                        <div class="quick-dates">
                            <div class="quick-date-item" data-date="2025-10-25">
                                <div class="date-info">
                                    <span class="month">Oct 25</span>
                                    <span class="price">from $1937</span>
                                </div>
                            </div>
                            <div class="quick-date-item active" data-date="2025-11-25">
                                <div class="date-info">
                                    <span class="month">Nov 25</span>
                                    <span class="price">from $1662</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2025-12-25">
                                <div class="date-info">
                                    <span class="month">Dec 25</span>
                                    <span class="price">from $1662</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-01-26">
                                <div class="date-info">
                                    <span class="month">Jan 26</span>
                                    <span class="price">from $1662</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-02-26">
                                <div class="date-info">
                                    <span class="month">Feb 26</span>
                                    <span class="price">from $1662</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-03-26">
                                <div class="date-info">
                                    <span class="month">Mar 26</span>
                                    <span class="price">from $2176</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-04-26">
                                <div class="date-info">
                                    <span class="month">Apr 26</span>
                                    <span class="price">from $2176</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-05-26">
                                <div class="date-info">
                                    <span class="month">May 26</span>
                                    <span class="price">from $2176</span>
                                </div>
                            </div>
                            <div class="quick-date-item" data-date="2026-06-26">
                                <div class="date-info">
                                    <span class="month">Jun 26</span>
                                    <span class="price">from $2176</span>
                                </div>
                            </div>
                        </div>

                        <!-- Date Options Grid -->
                        <div class="date-options-grid">
                            <!-- Date Option 1 -->
                            <div class="date-option-card" data-departure="2025-11-02" data-return="2025-11-09">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="date-range">
                                            <span class="day-label">Sun - Sun</span>
                                            <h4 class="date-text">Nov 02, 2025 - Nov 09, 2025</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="discount-info">
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Operator discount: -$1084</span>
                                            </div>
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Tourhub's Discount: -$34</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <div class="pricing-info">
                                            <div class="original-price">$2780</div>
                                            <div class="final-price">$1662</div>
                                            <button class="btn-check-spaces">Check Spaces</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Option 2 -->
                            <div class="date-option-card" data-departure="2025-11-09" data-return="2025-11-16">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="date-range">
                                            <span class="day-label">Sun - Sun</span>
                                            <h4 class="date-text">Nov 09, 2025 - Nov 16, 2025</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="discount-info">
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Operator discount: -$1084</span>
                                            </div>
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Tourhub's Discount: -$34</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <div class="pricing-info">
                                            <div class="original-price">$2780</div>
                                            <div class="final-price">$1662</div>
                                            <button class="btn-check-spaces">Check Spaces</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Option 3 -->
                            <div class="date-option-card" data-departure="2025-11-16" data-return="2025-11-23">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="date-range">
                                            <span class="day-label">Sun - Sun</span>
                                            <h4 class="date-text">Nov 16, 2025 - Nov 23, 2025</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="discount-info">
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Operator discount: -$1084</span>
                                            </div>
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Tourhub's Discount: -$34</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <div class="pricing-info">
                                            <div class="original-price">$2780</div>
                                            <div class="final-price">$1662</div>
                                            <button class="btn-check-spaces">Check Spaces</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Option 4 -->
                            <div class="date-option-card" data-departure="2025-11-23" data-return="2025-11-30">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="date-range">
                                            <span class="day-label">Sun - Sun</span>
                                            <h4 class="date-text">Nov 23, 2025 - Nov 30, 2025</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="discount-info">
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Operator discount: -$1084</span>
                                            </div>
                                            <div class="discount-item">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Tourhub's Discount: -$34</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <div class="pricing-info">
                                            <div class="original-price">$2780</div>
                                            <div class="final-price">$1662</div>
                                            <button class="btn-check-spaces">Check Spaces</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Continue Button -->
                        <div class="continue-section">
                            <a href={{ route('contact') }}>
                            <button class="btn-continue" id="continueBtn">
                                Continue Enquiry
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
