@extends('user.layouts.app')
@section('title', 'Terms and Conditions')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/terms.css') }}">
@endpush

@section('content')
    @php
        $breadcrumbs = [['title' => 'Terms and Conditions', 'url' => '/terms-and-conditions']];
    @endphp

    <!-- Terms and Conditions Hero Section -->
    <section class="terms-hero" style="background-image: url({{ asset('images/Untitled.png') }});">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Terms and Conditions</h1>
                    <p class="hero-subtitle">Please read these terms and conditions carefully before using our services</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms Content Section -->
    <section class="terms-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="terms-wrapper">

                        <!-- Last Updated -->
                        <div class="last-updated">
                            <p class="text-muted">Last updated: {{ date('F j, Y') }}</p>
                        </div>

                        <!-- Introduction -->
                        <section class="terms-section">
                            <h2>1. Introduction</h2>
                            <p>Welcome to our Turkey travel website. These terms and conditions outline the rules and regulations for the use of our website and services.</p>
                            <p>By accessing this website and using our services, you accept these terms and conditions in full. Do not continue to use our website if you do not accept all of the terms and conditions stated on this page.</p>
                        </section>

                        <!-- Definitions -->
                        <section class="terms-section">
                            <h2>2. Definitions</h2>
                            <ul>
                                <li><strong>"Company"</strong> refers to our travel agency</li>
                                <li><strong>"Website"</strong> refers to our Turkey travel website</li>
                                <li><strong>"Services"</strong> refers to tour packages, bookings, and related travel services</li>
                                <li><strong>"User/Customer"</strong> refers to any person using our website or services</li>
                                <li><strong>"Booking"</strong> refers to the reservation of our travel services</li>
                            </ul>
                        </section>

                        <!-- Booking Terms -->
                        <section class="terms-section">
                            <h2>3. Booking Terms</h2>
                            <h3>3.1 Reservation Process</h3>
                            <p>All bookings must be made through our website or authorized agents. A booking is confirmed only after:</p>
                            <ul>
                                <li>Full payment or deposit has been received</li>
                                <li>Booking confirmation has been sent via email</li>
                                <li>All required documents have been provided</li>
                            </ul>

                            <h3>3.2 Payment Terms</h3>
                            <ul>
                                <li>A deposit of 30% is required to secure your booking</li>
                                <li>Full payment must be made 30 days before departure</li>
                                <li>All payments are processed in USD unless otherwise specified</li>
                                <li>Payment methods accepted: Credit card, bank transfer, or cash</li>
                            </ul>
                        </section>

                        <!-- Cancellation Policy -->
                        <section class="terms-section">
                            <h2>4. Cancellation and Refund Policy</h2>
                            <h3>4.1 Cancellation by Customer</h3>
                            <ul>
                                <li>More than 30 days before departure: 20% cancellation fee</li>
                                <li>15-30 days before departure: 50% cancellation fee</li>
                                <li>7-14 days before departure: 75% cancellation fee</li>
                                <li>Less than 7 days before departure: 100% cancellation fee</li>
                            </ul>

                            <h3>4.2 Cancellation by Company</h3>
                            <p>In rare cases where we must cancel a tour due to unforeseen circumstances:</p>
                            <ul>
                                <li>Full refund will be provided</li>
                                <li>Alternative arrangements will be offered when possible</li>
                                <li>No compensation for additional expenses incurred</li>
                            </ul>
                        </section>

                        <!-- Travel Requirements -->
                        <section class="terms-section">
                            <h2>5. Travel Requirements</h2>
                            <h3>5.1 Documentation</h3>
                            <p>Customers are responsible for ensuring they have:</p>
                            <ul>
                                <li>Valid passport (minimum 6 months validity)</li>
                                <li>Appropriate visa for Turkey</li>
                                <li>Travel insurance</li>
                                <li>Any required vaccinations</li>
                            </ul>

                            <h3>5.2 Health and Safety</h3>
                            <ul>
                                <li>Customers must disclose any medical conditions</li>
                                <li>We reserve the right to refuse service for safety reasons</li>
                                <li>Customers participate in activities at their own risk</li>
                            </ul>
                        </section>

                        <!-- Liability and Insurance -->
                        <section class="terms-section">
                            <h2>6. Liability and Insurance</h2>
                            <h3>6.1 Company Liability</h3>
                            <p>Our liability is limited to the cost of the services booked. We are not liable for:</p>
                            <ul>
                                <li>Loss or damage to personal belongings</li>
                                <li>Personal injury or illness</li>
                                <li>Delays caused by third parties</li>
                                <li>Force majeure events</li>
                            </ul>

                            <h3>6.2 Travel Insurance</h3>
                            <p>We strongly recommend purchasing comprehensive travel insurance covering:</p>
                            <ul>
                                <li>Trip cancellation and interruption</li>
                                <li>Medical expenses</li>
                                <li>Lost luggage</li>
                                <li>Emergency evacuation</li>
                            </ul>
                        </section>

                        <!-- Code of Conduct -->
                        <section class="terms-section">
                            <h2>7. Customer Code of Conduct</h2>
                            <p>Customers are expected to:</p>
                            <ul>
                                <li>Respect local laws and customs</li>
                                <li>Treat fellow travelers and staff with respect</li>
                                <li>Follow tour guidelines and instructions</li>
                                <li>Arrive on time for scheduled activities</li>
                                <li>Take responsibility for personal safety</li>
                            </ul>
                        </section>

                        <!-- Privacy Policy -->
                        <section class="terms-section">
                            <h2>8. Privacy and Data Protection</h2>
                            <p>We are committed to protecting your privacy:</p>
                            <ul>
                                <li>Personal information is used only for booking purposes</li>
                                <li>Data is stored securely and not shared with third parties</li>
                                <li>You have the right to access and correct your information</li>
                                <li>We comply with relevant data protection laws</li>
                            </ul>
                        </section>

                        <!-- Changes to Terms -->
                        <section class="terms-section">
                            <h2>9. Changes to Terms and Conditions</h2>
                            <p>We reserve the right to modify these terms at any time:</p>
                            <ul>
                                <li>Changes will be posted on this page</li>
                                <li>Continued use of our services constitutes acceptance</li>
                                <li>Major changes will be communicated to active customers</li>
                            </ul>
                        </section>

                        <!-- Contact Information -->
                        <section class="terms-section">
                            <h2>10. Contact Information</h2>
                            <p>If you have any questions about these terms and conditions, please contact us:</p>
                            <ul>
                                <li><strong>Email:</strong> info@turkeytravel.com</li>
                                <li><strong>Phone:</strong> +90 XXX XXX XXXX</li>
                                <li><strong>Address:</strong> [Company Address], Turkey</li>
                            </ul>
                        </section>

                        <!-- Agreement -->
                        <section class="terms-section agreement-section">
                            <div class="alert alert-info">
                                <h3>Agreement</h3>
                                <p>By using our website and services, you acknowledge that you have read, understood, and agree to be bound by these terms and conditions.</p>
                                <p class="text-muted">If you do not agree with any part of these terms, please do not use our services.</p>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
