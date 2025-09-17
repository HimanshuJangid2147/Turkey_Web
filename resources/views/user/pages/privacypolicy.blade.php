@extends('user.layouts.app')
@section('title', 'Privacy Policy')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Privacy Policy', 'url' => '/privacypolicy']
        ];
    @endphp

    {{-- Include Breadcrumb --}}
    <section class="breadcrumb-section">
        @include('user.partials.breadcrum')
    </section>

    <section class="privacy-policy-section py-5">
        <div class="container rounded p-4 backdrop:blur" style="background-color: var(--rgba-white-48);">
            <h1 class="mb-4">Privacy Policy</h1>
            <p class="lead">At [Your Company Name], we take your privacy seriously. This Privacy Policy outlines how we collect, use, and protect your personal information.</p>
            <h2 class="mt-4">Information We Collect</h2>
            <p>We may collect the following information:</p>
            <ul>
                <li>Personal information, such as your name, email address, and contact details.</li>
                <li>Usage data, such as your IP address, browser type, and device information.</li>
            </ul>
            <h2 class="mt-4">How We Use Your Information</h2>
            <p>We use your information to:</p>
            <ul>
                <li>Provide and improve our services.</li>
                <li>Respond to your inquiries and support requests.</li>
                <li>Send you promotional emails and updates.</li>
            </ul>
            <h2 class="mt-4">Data Security</h2>
            <p>We implement appropriate security measures to protect your information from unauthorized access or disclosure.</p>
            <h2 class="mt-4">Third-Party Services</h2>
            <p>We may use third-party services, such as analytics tools, to analyze and improve our services. These services may collect information about your usage and behavior.</p>
            <h2 class="mt-4">Changes to This Privacy Policy</h2>
            <p>We may update this Privacy Policy from time to time. Any changes will be effective immediately upon posting the updated policy on our website.</p>
        </div>
    </section>
@endsection
