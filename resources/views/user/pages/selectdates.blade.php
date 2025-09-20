@extends('user.layouts.app')
@section('title', 'Select Dates')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_css/selectdates.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/user/selectdates.js') }}"></script>
@endpush
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Select Dates', 'url' => '/selectdates']
        ]
    @endphp

    <section class="select-dates-hero" style="background-image: url({{ asset('images/Untitled.png') }});">
        <div class="select-dates-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="hero-title">Select Your Dates</h1>
                    <p class="hero-subtitle">Plan your perfect trip with us!</p>
                    {{-- search bar --}}
                    <div class="select-dates-search">
                        <div class="search-wrapper">
                            <i class="fa fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Search destinations..."
                                id="searchInput">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
