@extends('user.layouts.app')
@section('title', 'Privacy Policy')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user_css/privacypolicy.css') }}">
@endpush

@section('content')
    @php
        $breadcrumbs = [['title' => 'Privacy Policy', 'url' => '/privacypolicy']];
    @endphp

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/privacypolicy.css') }}">

    <section class="privacy-policy-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="privacy-card rounded-4 p-5 shadow-lg position-relative overflow-hidden"
                        style="background: linear-gradient(135deg, var(--rgba-white-48) 0%, var(--rgba-white-60) 100%); backdrop-filter: blur(20px); border: 1px solid var(--rgba-white-60);">

                        {{-- Decorative background elements --}}
                        <div class="position-absolute top-0 end-0 opacity-25">
                            <div class="privacy-decoration"
                                style="width: 200px; height: 200px; background: radial-gradient(circle, var(--rgba-gray-100-05) 0%, transparent 70%); border-radius: 50%; transform: translate(50%, -50%);">
                            </div>
                        </div>

                        {{-- Header Section --}}
                        <div class="text-center mb-5">
                            <div class="privacy-icon mb-3">
                                <svg width="60" height="60" fill="currentColor" class="text-primary"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                </svg>
                            </div>
                            <h1 class="display-4 fw-bold text-dark mb-3">Privacy Policy</h1>
                            <div class="privacy-divider mx-auto mb-4"
                                style="width: 80px; height: 3px; background: linear-gradient(90deg, var(--bs-primary), var(--bs-info)); border-radius: 2px;">
                            </div>
                            <p class="lead text-muted px-lg-4">At [Your Company Name], we take your privacy seriously. This
                                Privacy Policy outlines how we collect, use, and protect your personal information with the
                                utmost care and transparency.</p>
                        </div>

                        {{-- Content Sections --}}
                        <div class="privacy-content">
                            {{-- Information We Collect --}}
                            <div class="privacy-section mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="section-icon me-3">
                                        <svg width="24" height="24" fill="currentColor" class="text-primary"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </div>
                                    <h2 class="h3 fw-bold text-dark mb-0">Information We Collect</h2>
                                </div>
                                <p class="text-muted mb-3">We may collect the following types of information to provide you
                                    with the best possible service:</p>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="info-card h-100 p-3 rounded-3"
                                            style="background: var(--rgba-primary-light-60); border-left: 4px solid var(--bs-primary);">
                                            <h5 class="fw-semibold text-primary mb-2">Personal Information</h5>
                                            <p class="small text-muted mb-0">Name, email address, contact details, and other
                                                identifying information you provide.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card h-100 p-3 rounded-3"
                                            style="background: var(--rgba-secondary-05); border-left: 4px solid var(--bs-success);">
                                            <h5 class="fw-semibold text-success mb-2">Usage Data</h5>
                                            <p class="small text-muted mb-0">IP address, browser type, device information,
                                                and interaction patterns.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- How We Use Your Information --}}
                            <div class="privacy-section mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="section-icon me-3">
                                        <svg width="24" height="24" fill="currentColor" class="text-info"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.292-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.292c.415.764-.42 1.6-1.185 1.184l-.292-.159a1.873 1.873 0 0 0-2.692 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.693-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.292A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>
                                    </div>
                                    <h2 class="h3 fw-bold text-dark mb-0">How We Use Your Information</h2>
                                </div>
                                <p class="text-muted mb-4">Your information helps us deliver exceptional services tailored
                                    to your needs:</p>
                                <div class="usage-list">
                                    <div class="usage-item d-flex align-items-start mb-3 p-3 rounded-3"
                                        style="background: var(--rgba-primary-light-60);">
                                        <div class="usage-icon me-3 mt-1">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: var(--bs-info); color: white;">
                                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold mb-1">Service Provision & Enhancement</h5>
                                            <p class="text-muted small mb-0">Deliver, maintain, and continuously improve our
                                                services based on your needs and feedback.</p>
                                        </div>
                                    </div>
                                    <div class="usage-item d-flex align-items-start mb-3 p-3 rounded-3"
                                        style="background: var(--rgba-secondary-05);">
                                        <div class="usage-icon me-3 mt-1">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: var(--bs-success); color: white;">
                                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold mb-1">Customer Support</h5>
                                            <p class="text-muted small mb-0">Respond promptly to your inquiries, support
                                                requests, and provide personalized assistance.</p>
                                        </div>
                                    </div>
                                    <div class="usage-item d-flex align-items-start mb-3 p-3 rounded-3"
                                        style="background: var(--rgba-yellow-light);">
                                        <div class="usage-icon me-3 mt-1">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: var(--bs-warning); color: white;">
                                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fw-semibold mb-1">Communications</h5>
                                            <p class="text-muted small mb-0">Send relevant updates, promotional content, and
                                                important service announcements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Data Security --}}
                            <div class="privacy-section mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="section-icon me-3">
                                        <svg width="24" height="24" fill="currentColor" class="text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                            <path
                                                d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </div>
                                    <h2 class="h3 fw-bold text-dark mb-0">Data Security</h2>
                                </div>
                                <div class="security-card p-4 rounded-3"
                                    style="background: linear-gradient(135deg, var(--rgba-secondary-05) 0%, rgba(25, 135, 84, 0.02) 100%); border: 1px solid var(--rgba-secondary-05);">
                                    <p class="text-muted mb-3">Your data security is our top priority. We implement
                                        comprehensive security measures including:</p>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <div class="security-check me-2" style="color: var(--bs-success);">✓</div>
                                                <span class="small">Industry-standard encryption</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <div class="security-check me-2" style="color: var(--bs-success);">✓</div>
                                                <span class="small">Regular security audits</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <div class="security-check me-2" style="color: var(--bs-success);">✓</div>
                                                <span class="small">Access control systems</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center">
                                                <div class="security-check me-2" style="color: var(--bs-success);">✓</div>
                                                <span class="small">Secure data storage</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Third-Party Services --}}
                            <div class="privacy-section mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="section-icon me-3">
                                        <svg width="24" height="24" fill="currentColor" class="text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                            <path
                                                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                        </svg>
                                    </div>
                                    <h2 class="h3 fw-bold text-dark mb-0">Third-Party Services</h2>
                                </div>
                                <div class="third-party-card p-4 rounded-3"
                                    style="background: var(--rgba-yellow-light); border-left: 4px solid var(--bs-warning);">
                                    <p class="text-muted mb-2">We work with trusted third-party services to enhance your
                                        experience, including analytics tools and service providers. These partners may
                                        collect information about your usage and behavior to help us improve our services.
                                    </p>
                                    <p class="small text-muted mb-0"><strong>Note:</strong> All third-party services are
                                        carefully vetted and must comply with our privacy standards.</p>
                                </div>
                            </div>

                            {{-- Changes to This Privacy Policy --}}
                            <div class="privacy-section">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="section-icon me-3">
                                        <svg width="24" height="24" fill="currentColor" class="text-secondary"
                                            viewBox="0 0 16 16">
                                            <path d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                        </svg>
                                    </div>
                                    <h2 class="h3 fw-bold text-dark mb-0">Changes to This Privacy Policy</h2>
                                </div>
                                <div class="update-card p-4 rounded-3"
                                    style="background: rgba(108, 117, 125, 0.05); border: 1px solid rgba(108, 117, 125, 0.1);">
                                    <p class="text-muted mb-0">We may update this Privacy Policy periodically to reflect
                                        changes in our practices or legal requirements. Any significant changes will be
                                        communicated to you via email or prominent notice on our website. The updated policy
                                        becomes effective immediately upon posting.</p>
                                </div>
                            </div>
                        </div>

                        {{-- Footer CTA --}}
                        <div class="text-center mt-5 pt-4" style="border-top: 1px solid rgba(0,0,0,0.1);">
                            <div class="contact-info p-4 rounded-3" style="background: var(--rgba-primary-light-60);">
                                <h5 class="fw-semibold text-primary mb-2">Questions About Your Privacy?</h5>
                                <p class="text-muted small mb-3">We're here to help! If you have any questions or concerns
                                    about this Privacy Policy or how we handle your data, please don't hesitate to contact
                                    us.</p>
                                <a href="#" class="btn btn-primary btn-sm rounded-pill px-4">Contact Us</a>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <small class="text-muted">Last updated: {{ date('F j, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
