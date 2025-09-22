@extends('user.layouts.app')
@section('title', 'Frequently Asked Questions')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/faq.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/user/faq.js') }}"></script>
@endpush

@section('content')
    @php
        $breadcrumbs = [['title' => 'FAQ', 'url' => '/faq']];
    @endphp

    <!-- FAQ Hero Section -->
    <section class="faq-hero" style="background-image: url({{ asset('images/Untitled.png') }});">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Frequently Asked Questions</h1>
                    <p class="hero-subtitle">Find answers to common questions about our Turkey travel services</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Content Section -->
    <section class="faq-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="faq-wrapper">

                        <!-- Search Section -->
                        <div class="faq-search-section">
                            <div class="search-container">
                                <input type="text" id="faqSearch" class="faq-search-input" placeholder="Search FAQs...">
                                <i class="fas fa-search search-icon"></i>
                            </div>
                        </div>

                        <!-- FAQ Categories -->
                        <div class="faq-categories">
                            <button class="category-btn active" data-category="all">All Questions</button>
                            <button class="category-btn" data-category="booking">Booking & Payment</button>
                            <button class="category-btn" data-category="travel">Travel Requirements</button>
                            <button class="category-btn" data-category="cancellation">Cancellation & Refunds</button>
                            <button class="category-btn" data-category="services">Services & Amenities</button>
                        </div>

                        <!-- FAQ Accordion -->
                        <div class="faq-accordion" id="faqAccordion">

                            <!-- Booking & Payment -->
                            <div class="faq-item" data-category="booking">
                                <div class="faq-question">
                                    <h3>How do I book a tour package?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>You can book a tour package directly through our website by selecting your desired destination and dates. Simply click on "View Details" on any tour card, choose your preferred dates, and follow the booking process. You can also contact our customer service team for assistance.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="booking">
                                <div class="faq-question">
                                    <h3>What payment methods do you accept?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>We accept various payment methods including credit cards (Visa, MasterCard, American Express), bank transfers, and cash payments. All online payments are processed securely through encrypted channels. A 30% deposit is required to confirm your booking.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="booking">
                                <div class="faq-question">
                                    <h3>When is the full payment due?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>The remaining balance (70%) is due 30 days before your departure date. If you book within 30 days of departure, full payment is required at the time of booking. We'll send you payment reminders via email.</p>
                                </div>
                            </div>

                            <!-- Travel Requirements -->
                            <div class="faq-item" data-category="travel">
                                <div class="faq-question">
                                    <h3>Do I need a visa to visit Turkey?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Visa requirements depend on your nationality. Many countries are eligible for visa-free entry or e-Visa. Please check the current visa requirements for your specific nationality. We recommend applying for necessary visas at least 4-6 weeks before your travel date.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="travel">
                                <div class="faq-question">
                                    <h3>What documents do I need for travel?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>You'll need a valid passport (minimum 6 months validity), appropriate visa if required, travel insurance, and any vaccination certificates if applicable. We recommend keeping digital copies of all important documents.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="travel">
                                <div class="faq-question">
                                    <h3>Is travel insurance included?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Travel insurance is not included in our tour packages but is highly recommended. We can help you arrange comprehensive travel insurance that covers trip cancellation, medical expenses, lost luggage, and emergency evacuation.</p>
                                </div>
                            </div>

                            <!-- Cancellation & Refunds -->
                            <div class="faq-item" data-category="cancellation">
                                <div class="faq-question">
                                    <h3>What is your cancellation policy?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <ul>
                                        <li>More than 30 days before departure: 20% cancellation fee</li>
                                        <li>15-30 days before departure: 50% cancellation fee</li>
                                        <li>7-14 days before departure: 75% cancellation fee</li>
                                        <li>Less than 7 days before departure: 100% cancellation fee</li>
                                    </ul>
                                    <p>Cancellation fees help cover our pre-booked services and administrative costs.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="cancellation">
                                <div class="faq-question">
                                    <h3>How do I request a refund?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>To request a refund, please contact our customer service team within the applicable timeframe. Provide your booking reference number and reason for cancellation. Refunds will be processed within 7-14 business days to your original payment method.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="cancellation">
                                <div class="faq-question">
                                    <h3>Can I reschedule my trip?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes, you can reschedule your trip subject to availability and any price differences. Rescheduling requests must be made at least 14 days before departure. Additional fees may apply depending on the new dates and services required.</p>
                                </div>
                            </div>

                            <!-- Services & Amenities -->
                            <div class="faq-item" data-category="services">
                                <div class="faq-question">
                                    <h3>What is included in your tour packages?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Our tour packages typically include accommodation, airport transfers, guided tours, entrance fees to attractions, and some meals as specified. Detailed inclusions are listed on each package page. International flights are not included unless specified.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="services">
                                <div class="faq-question">
                                    <h3>Do you provide airport transfers?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Yes, airport transfers are included in most of our packages. We'll arrange pick-up and drop-off at designated airports. Please provide your flight details at least 48 hours before arrival for smooth coordination.</p>
                                </div>
                            </div>

                            <div class="faq-item" data-category="services">
                                <div class="faq-question">
                                    <h3>Are meals included in the packages?</h3>
                                    <i class="fas fa-plus faq-toggle-icon"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Meal inclusions vary by package. Most packages include breakfast at hotels. Some packages include additional meals like welcome dinners or special dining experiences. Detailed meal information is provided in each package description.</p>
                                </div>
                            </div>

                        </div>

                        <!-- Contact CTA -->
                        <div class="faq-contact-cta">
                            <div class="contact-card">
                                <h3>Still have questions?</h3>
                                <p>Our customer service team is here to help you with any questions or concerns.</p>
                                <div class="contact-buttons">
                                    <a href="{{ route('contact') }}" class="btn-primary-custom">
                                        <i class="fas fa-phone"></i>
                                        <span>Contact Us</span>
                                    </a>
                                    <a href="mailto:info@turkeytravel.com" class="btn-secondary-custom">
                                        <i class="fas fa-envelope"></i>
                                        <span>Email Us</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
