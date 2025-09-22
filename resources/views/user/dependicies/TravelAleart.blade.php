@push('styles')
    <link rel="stylesheet" href="{{asset('css/user_css/alert.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('js/user/alert.js')}}"></script>
@endpush
{{-- Top Bar Showing Turkey travel deals and seasonal offers --}}
<section class="alert-bar">
    <div class="alert-bar-content">
        <div class="alert-icon">
            <i class="fas fa-bell"></i>
        </div>
        <div class="alert-text">
            <h3>🎉 Special Turkey Travel Deals!</h3>
            <p>Discover exclusive packages to Istanbul, Cappadocia & more. Limited time offers available!</p>
        </div>
        <div class="alert-button">
            <a href="/best-deals" class="btn">View Deals</a>
        </div>
        <button class="close-btn" onclick="closeAlert()">
            <i class="fas fa-times"></i>
        </button>
    </div>
</section>
