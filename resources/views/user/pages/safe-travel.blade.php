@extends('user.layouts.app')
@section('title', 'Safe Travel Guidelines')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/safe-travel.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/user/safe-travel.js') }}"></script>
@endpush

@section('content')
    @php
        $breadcrumbs = [['title' => 'Safe Travel', 'url' => '/safe-travel']];
    @endphp

    <!-- Safe Travel Hero Section -->
    <section class="safe-travel-hero" style="background-image: url({{ asset('images/Istanbul-Sightseeing.jpg') }});">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Safe Travel Guidelines</h1>
                    <p class="hero-subtitle">Your safety is our top priority. Discover essential tips and guidelines for a secure journey in Turkey</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety Overview Section -->
    <section class="safety-overview">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Turkey Safety Overview</h2>
                    <p class="section-subtitle">Turkey is generally a safe destination for travelers, but it's always wise to stay informed and prepared</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="safety-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Safety Rating</h3>
                        <p class="stat-value">Level 2</p>
                        <p class="stat-description">Exercise increased caution</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="safety-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h3>Emergency Services</h3>
                        <p class="stat-value">Available 24/7</p>
                        <p class="stat-description">Modern medical facilities</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="safety-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Tourist Police</h3>
                        <p class="stat-value">155</p>
                        <p class="stat-description">English-speaking support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety Guidelines Section -->
    <section class="safety-guidelines">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="guidelines-wrapper">

                        <!-- General Safety Tips -->
                        <div class="guideline-category">
                            <div class="category-header">
                                <h3><i class="fas fa-user-shield"></i> General Safety Tips</h3>
                                <p>Essential precautions for all travelers</p>
                            </div>
                            <div class="guideline-items">
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Stay Aware of Your Surroundings</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Always be aware of your surroundings, especially in crowded tourist areas. Keep an eye on your belongings and avoid displaying expensive items like jewelry or large amounts of cash.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Use Licensed Transportation</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Always use licensed taxis, official airport transfers, or reputable ride-sharing services. Avoid unlicensed cabs, especially at night or in unfamiliar areas.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Keep Important Documents Safe</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Store your passport, visa, and important documents in a hotel safe. Carry photocopies or digital copies when exploring. Keep emergency contact numbers handy.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Health & Medical -->
                        <div class="guideline-category">
                            <div class="category-header">
                                <h3><i class="fas fa-heartbeat"></i> Health & Medical Safety</h3>
                                <p>Health precautions and medical information</p>
                            </div>
                            <div class="guideline-items">
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Travel Insurance</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Ensure you have comprehensive travel insurance that covers medical emergencies, trip cancellation, and lost belongings. Check if your policy covers adventure activities if you plan to participate in them.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Water and Food Safety</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Drink bottled water and avoid tap water unless you're sure it's safe. Eat at reputable restaurants and try street food from busy, popular vendors. Wash your hands frequently and carry hand sanitizer.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Medical Facilities</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Turkey has excellent medical facilities in major cities. Private hospitals often have English-speaking staff. Keep your insurance information and emergency contacts readily available.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Local Laws & Customs -->
                        <div class="guideline-category">
                            <div class="category-header">
                                <h3><i class="fas fa-gavel"></i> Local Laws & Customs</h3>
                                <p>Respect local regulations and cultural norms</p>
                            </div>
                            <div class="guideline-items">
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Photography Restrictions</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Avoid photographing military installations, government buildings, and airports. Always ask permission before photographing people, especially in rural areas or religious sites.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Cultural Sensitivity</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Dress modestly when visiting religious sites. Remove shoes before entering mosques. During Ramadan, be respectful of those fasting and avoid eating or drinking in public during daylight hours.</p>
                                    </div>
                                </div>
                                <div class="guideline-item">
                                    <div class="guideline-question">
                                        <h4>Alcohol Consumption</h4>
                                        <i class="fas fa-plus guideline-toggle-icon"></i>
                                    </div>
                                    <div class="guideline-answer">
                                        <p>Alcohol is widely available but public drunkenness is frowned upon. Some regions are more conservative than others. Always drink responsibly and never drink and drive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Information -->
                        <div class="emergency-section">
                            <div class="emergency-header">
                                <h3><i class="fas fa-exclamation-triangle"></i> Emergency Contacts</h3>
                                <p>Important phone numbers to keep handy during your trip</p>
                            </div>
                            <div class="emergency-grid">
                                <div class="emergency-card">
                                    <div class="emergency-icon">
                                        <i class="fas fa-ambulance"></i>
                                    </div>
                                    <h4>Medical Emergency</h4>
                                    <p class="emergency-number">112</p>
                                    <p class="emergency-description">Ambulance services available nationwide</p>
                                </div>
                                <div class="emergency-card">
                                    <div class="emergency-icon">
                                        <i class="fas fa-fire-extinguisher"></i>
                                    </div>
                                    <h4>Fire Department</h4>
                                    <p class="emergency-number">110</p>
                                    <p class="emergency-description">Fire and rescue services</p>
                                </div>
                                <div class="emergency-card">
                                    <div class="emergency-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <h4>Police</h4>
                                    <p class="emergency-number">155</p>
                                    <p class="emergency-description">General police assistance</p>
                                </div>
                                <div class="emergency-card">
                                    <div class="emergency-icon">
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                    <h4>Tourist Police</h4>
                                    <p class="emergency-number">155</p>
                                    <p class="emergency-description">English-speaking tourist assistance</p>
                                </div>
                            </div>
                        </div>

                        <!-- Safety Resources -->
                        <div class="resources-section">
                            <div class="resources-header">
                                <h3><i class="fas fa-book"></i> Additional Resources</h3>
                                <p>Useful links and resources for safe travel planning</p>
                            </div>
                            <div class="resources-grid">
                                <a href="#" class="resource-card">
                                    <div class="resource-icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <h4>Travel Advisory</h4>
                                    <p>Check current travel advisories from your government</p>
                                    <span class="resource-link">Visit Website →</span>
                                </a>
                                <a href="#" class="resource-card">
                                    <div class="resource-icon">
                                        <i class="fas fa-hospital"></i>
                                    </div>
                                    <h4>Health Guidelines</h4>
                                    <p>COVID-19 and health requirements for Turkey</p>
                                    <span class="resource-link">Learn More →</span>
                                </a>
                                <a href="#" class="resource-card">
                                    <div class="resource-icon">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h4>Safe Areas Guide</h4>
                                    <p>Recommended safe areas and neighborhoods</p>
                                    <span class="resource-link">View Guide →</span>
                                </a>
                                <a href="#" class="resource-card">
                                    <div class="resource-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h4>Emergency App</h4>
                                    <p>Download emergency assistance apps</p>
                                    <span class="resource-link">Download →</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="contact-cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="contact-cta-card">
                        <h3>Need Additional Safety Information?</h3>
                        <p>Our experienced travel consultants are here to help you plan a safe and enjoyable trip to Turkey.</p>
                        <div class="cta-buttons">
                            <a href="{{ route('contact') }}" class="btn-primary-custom">
                                <i class="fas fa-phone"></i>
                                <span>Contact Safety Team</span>
                            </a>
                            <a href="mailto:safety@turkeytravel.com" class="btn-secondary-custom">
                                <i class="fas fa-envelope"></i>
                                <span>Email Safety Support</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
