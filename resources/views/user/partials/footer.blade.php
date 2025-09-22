<footer class="site-footer">
    @include('user.partials.newsletter')
    <div class="container">
        <div class="row gy-4 gx-lg-5 align-items-start">

            <!-- Left side: Contact details and social media links -->
            <div class="col-lg-3 col-md-12">
                <div class="footer-card">
                    <div class="footer-brand">
                        <img src="{{ asset('icons/Satguru-new-preloader.gif') }}" alt="Logo" class="footer-brand-icon"
                            height="50" width="80">
                        <h4 class="footer-brand-text">Turkey Travel</h4>
                    </div>
                    <p class="footer-card-description">
                        Discover the magic of Turkey with our expertly curated travel experiences. Creating
                        unforgettable memories since 1989.
                    </p>
                </div>
            </div>

            <!-- Space between sections -->
            <div class="col-lg-1 col-md-12"></div>

            <!-- Right side: 3 sections -->
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <h5 class="footer-heading">Booking</h5>
                        <ul class="footer-links">
                            <li><a href={{ route('safe-travel') }}>Safe Travels</a></li>
                            <li><a href="{{ route('travel-alerts') }}">Travel Alerts</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <h5 class="footer-heading">Company</h5>
                        <ul class="footer-links">
                            <li><a href={{ route('aboutus') }}>About Us</a></li>
                            <li><a href={{ route('privacypolicy') }}>Privacy Policy</a></li>
                            <li><a href={{ route('terms-and-conditions') }}>Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <h5 class="footer-heading">Contact</h5>
                        <ul class="footer-links">
                            <li><a href={{ route('contact') }}>Get in Touch</a></li>
                            <li><a href={{ route('faq') }}>FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">© {{ date('Y') }} Turkey Travel. All rights reserved.</p>
            <div class="footer-socials">
                <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
