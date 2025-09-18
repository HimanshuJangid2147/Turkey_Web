@extends('user.layouts.app')
@section('title', 'Contact Us')
@section('content')
@php
    $breadcrumbs = [
        ['title' => 'Contact', 'url' => '/contact']
    ];
@endphp

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/contact.css') }}">
@endpush

<section class="contact-hero" style="background-image: url('{{ asset('images/Untitled.png') }}');">
    <div class="container contact-hero-content">
        <h1 class="mb-3">Get In Touch</h1>
        <p class="lead">Have questions or ready to book your next adventure? Our team is here to help you every step of the way. Reach out, and let's start planning!</p>
    </div>
</section>

<section class="contact-section py-5">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <div class="col-lg-7">
                <div class="contact-form-card">
                    <h3 class="fw-bold mb-4 text-dark">Send a Message</h3>
                    <form id="contactForm" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control" placeholder="Email Address *" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                    <input type="tel" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-12">
                                <select class="form-select form-control" required>
                                    <option selected disabled value="">Choose subject...</option>
                                    <option>Booking Inquiry</option>
                                    <option>Tour Information</option>
                                    <option>Customer Support</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Your Message *" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn submit-btn text-white w-100">
                                    <i class="bi bi-send-fill me-2"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-panel d-flex flex-column">
                    <h3 class="text-white">Contact Information</h3>
                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Our Office</h6>
                            <p class="mb-0">123 Tourism Street, Sultanahmet<br>Istanbul, Turkey</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-telephone-fill icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Phone</h6>
                            <p class="mb-0"><a href="tel:+902125550123">+90 212 555 0123</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-envelope-fill icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-0"><a href="mailto:info@turkeytravel.com">info@turkeytravel.com</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-clock-fill icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Business Hours</h6>
                            <p class="mb-0">Mon - Fri: 9AM - 6PM<br>Sat: 10AM - 4PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted">Find quick answers to common questions below.</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                What is the best time to visit Turkey?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The best time to visit Turkey is during the spring (April to May) and autumn (September to November) when the weather is mild and pleasant, perfect for exploring ancient sites and enjoying the coastline.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Do I need a visa to travel to Turkey?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Visa requirements vary by country. Many nationalities can obtain an e-Visa online before their trip. We recommend checking the official Turkish Ministry of Foreign Affairs website for the most up-to-date information.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                What are your booking and cancellation policies?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer flexible booking options. For detailed information on our policies, please visit our "Booking Conditions" page or contact our support team directly. We're happy to help you find a suitable solution.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.27909477082!2d28.975995!3d41.019037!2m3!1f0!2f13.1!3m3!1m2!1s0x14cab9b55ab3cf81%3A0x6a56e10f69a12c4f!2sSultanahmet%2C%20Fatih%2FIstanbul%2C%20Turkey!5e0!3m2!1sen!2sus!4v1668888888888!5m2!1sen!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="{{ asset('js/user/contact.js') }}"></script>
@endpush
@endsection
